<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAllProceduresAndFunctions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS getUsers;
                        CREATE PROCEDURE getUsers()
                        BEGIN
                            SELECT * FROM users;
                        END'
        );
        DB::unprepared('drop FUNCTION IF EXISTS notional_monthly_fees_chargeable_count;
                        CREATE FUNCTION notional_monthly_fees_chargeable_count (input_scr_id bigint) RETURNS int
                        DETERMINISTIC
                        BEGIN
                          DECLARE month_count int;
                          select TIMESTAMPDIFF(MONTH, effective_date, CURDATE())+1 INTO month_count from student_course_registrations where id=input_scr_id and is_completed=0 and is_started=1;
                            RETURN month_count;
                        END'
        );
        DB::unprepared('drop FUNCTION IF EXISTS get_fees_mode_by_scr_id ;
                        CREATE FUNCTION get_fees_mode_by_scr_id (input_scr_id bigint) RETURNS int
                        DETERMINISTIC
                        BEGIN
                        DECLARE mode_id int;
                            select courses.fees_mode_type_id INTO mode_id from student_course_registrations
                             inner join courses ON courses.id = student_course_registrations.course_id
                             where student_course_registrations.id=input_scr_id ;
                            RETURN mode_id;
                        END'

        );
        //this function will return the year of last monthly fees charged for a SCR number
        DB::unprepared('DROP FUNCTION IF EXISTS get_year_of_last_monthly_fees_charged;
                            CREATE FUNCTION get_year_of_last_monthly_fees_charged(input_scr_id bigint) RETURNS int
                            DETERMINISTIC
                            BEGIN
                              DECLARE temp_fees_year int;
                              select fees_year into temp_fees_year  from transaction_masters
                                inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                                where voucher_type_id=9 and student_course_registration_id=input_scr_id and transaction_details.ledger_id=9
                                order by transaction_masters.fees_year desc, transaction_masters.fees_month desc limit 1;
                              IF(temp_fees_year IS NULL) THEN
                                  SET temp_fees_year := 0;
                              END IF;
                                RETURN temp_fees_year;
                            END'

        );
        //this function will return the year of last monthly fees charged for a SCR number
        DB::unprepared('DROP FUNCTION IF EXISTS get_month_of_last_monthly_fees_charged;
                            CREATE FUNCTION get_month_of_last_monthly_fees_charged(input_scr_id bigint) RETURNS int
                            DETERMINISTIC
                            BEGIN
                              DECLARE temp_fees_month int;
                              select fees_month into temp_fees_month  from transaction_masters
                                inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                                where voucher_type_id=9 and student_course_registration_id=input_scr_id and transaction_details.ledger_id=9
                                order by transaction_masters.fees_year desc, transaction_masters.fees_month desc limit 1;
                              IF(temp_fees_month IS NULL) THEN
                                  SET temp_fees_month := 0;
                              END IF;
                                RETURN temp_fees_month;
                            END'

        );
        //this function will return the next year
        DB::unprepared('DROP FUNCTION IF EXISTS get_next_year;
                            CREATE FUNCTION get_next_year (input_year int, input_month int) RETURNS int
                            DETERMINISTIC
                            BEGIN
                                DECLARE temp_year int;
                              select year(date_add(MAKEDATE(input_year, 1),INTERVAL  input_month month)) into temp_year;
                                RETURN temp_year;
                            END'
        );
        //this function will return the next month
        DB::unprepared('DROP FUNCTION IF EXISTS get_next_month;
                            CREATE FUNCTION get_next_month (input_year int, input_month int) RETURNS int
                            DETERMINISTIC
                            BEGIN
                                DECLARE temp_month int;
                              select year(date_add(MAKEDATE(input_year, 1),INTERVAL  input_month month)) into temp_month;
                                RETURN temp_month;
                            END'
        );
        //this function will return total fes charged by scr Id
        DB::unprepared('
        drop FUNCTION IF EXISTS get_total_fees_charged_by_scr_id;
        CREATE FUNCTION get_total_fees_charged_by_scr_id (input_scr_id bigint) RETURNS int
        DETERMINISTIC
        BEGIN
        DECLARE fees_charged int;
          select count(*) INTO fees_charged from transaction_details
          inner join transaction_masters ON transaction_masters.id = transaction_details.transaction_master_id
          where transaction_masters.student_course_registration_id=input_scr_id and transaction_details.ledger_id=9;
          RETURN fees_charged;
        END'

        );
        DB::unprepared('
        drop FUNCTION IF EXISTS get_due_of_one_month;
        CREATE FUNCTION get_due_of_one_month (input_tm_id bigint, input_rtm_id bigint) RETURNS int
        DETERMINISTIC
        BEGIN
          DECLARE month_due int;
          select
          (select amount from transaction_details
          inner join transaction_masters ON transaction_masters.id = transaction_details.transaction_master_id
          where transaction_masters.student_course_registration_id=7
          and ledger_id=16 and transaction_details.transaction_master_id=input_tm_id)-


          (select SUM(amount) from transaction_details
          inner join transaction_masters ON transaction_masters.id = transaction_details.transaction_master_id
          where transaction_masters.reference_transaction_master_id=input_rtm_id and transaction_details.ledger_id=1) INTO month_due;
          RETURN month_due;
        END
        ');

        DB::unprepared('
        DROP FUNCTION IF EXISTS get_total_fees_charge_by_studentregistration_ledger_id;
        CREATE FUNCTION `get_total_fees_charge_by_studentregistration_ledger_id`(input_studentregistration bigint,input_ledger_id bigint) RETURNS double
          DETERMINISTIC
          BEGIN
              DECLARE temp_total_charged double;
                set temp_total_charged=0;
                select sum(transaction_details.amount) into temp_total_charged from transaction_masters
                inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                where transaction_masters.student_course_registration_id=input_studentregistration
                and transaction_details.transaction_type_id=2
                and transaction_details.ledger_id=input_ledger_id;
                if isnull(temp_total_charged) then
                  set temp_total_charged=0;
                end if;
                    
                    RETURN temp_total_charged;
          END;');

          DB::unprepared('
          DROP FUNCTION IF EXISTS get_total_fees_received_by_studentregistration_ledger_id;
          CREATE FUNCTION `get_total_fees_received_by_studentregistration_ledger_id`(input_studentregistration bigint,input_ledger_id bigint) RETURNS double
              DETERMINISTIC
              BEGIN
                  DECLARE temp_total_received double;
                  set temp_total_received=0;
                  select sum(transaction_details.amount) into temp_total_received from transaction_masters
                  inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                  where transaction_masters.student_course_registration_id=input_studentregistration
                  and transaction_details.transaction_type_id=1
                  and transaction_details.ledger_id=input_ledger_id;
                  if isnull(temp_total_received) then
                    set temp_total_received=0;
                  end if;
                  RETURN temp_total_received;
              END;');
            // New Function
            DB::unprepared('
        DROP FUNCTION IF EXISTS  get_total_fees_received_by_transaction_ledger_id;
        CREATE FUNCTION  `get_total_fees_received_by_transaction_ledger_id`(input_transaction_id bigint,input_ledger_id bigint) RETURNS double
            DETERMINISTIC
        BEGIN
            DECLARE temp_total_received double;
            set temp_total_received=0;
            
           select sum(transaction_details.amount) into temp_total_received from transaction_masters
            inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
            where transaction_masters.reference_transaction_master_id=input_transaction_id
            and transaction_masters.voucher_type_id=4
            and transaction_details.transaction_type_id=1
            and transaction_details.ledger_id=input_ledger_id;
            
            if isnull(temp_total_received) then
              set temp_total_received=0;
            end if;
            RETURN temp_total_received;
        END;');

              DB::unprepared('
                              DROP FUNCTION IF EXISTS  get_total_billed_by_transaction_id;
                CREATE FUNCTION  `get_total_billed_by_transaction_id`(input_transaction_id bigint) RETURNS double
                    DETERMINISTIC
                BEGIN
                                    DECLARE temp_total_billed double;
                                    set temp_total_billed=0;
                                    select SUM(get_total_fees_charge_by_transaction_ledger_id(transaction_masters.id,transaction_details.ledger_id)) into temp_total_billed
                                            from transaction_masters
                                        inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                                        inner join ledgers ON ledgers.id = transaction_details.ledger_id
                                        inner join ledger_groups ON ledger_groups.id = ledgers.ledger_group_id
                                        where ledger_groups.id=6
                                        and (get_total_fees_charge_by_transaction_ledger_id(transaction_masters.id,transaction_details.ledger_id) -
                                        get_total_fees_received_by_transaction_ledger_id(transaction_masters.id,transaction_details.ledger_id))>0
                                        and transaction_masters.id=input_transaction_id;
                                          if isnull(temp_total_billed) then
                                                    set temp_total_billed=0;
                                                  end if;
                                                  RETURN temp_total_billed;
                                END;
                ');

                  DB::unprepared('
                  DROP FUNCTION IF EXISTS get_curr_month_total_cash;
                    CREATE FUNCTION `get_curr_month_total_cash`(input_organization_id int) RETURNS double
                        DETERMINISTIC
                    BEGIN
                        DECLARE temp_total_cash double;
                        set temp_total_cash=0;
                         select sum(transaction_details.amount) into temp_total_cash FROM transaction_masters
                        inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                        where transaction_details.transaction_type_id=1
                        and transaction_masters.voucher_type_id=4
                        and transaction_details.ledger_id=1
                        and month(transaction_masters.transaction_date)=month(curdate())
                        and transaction_masters.organisation_id=input_organization_id
                        and year(transaction_masters.transaction_date)=year(curdate());
                         if isnull(temp_total_cash) then
                                set temp_total_cash=0;
                              end if;
                                  
                           RETURN temp_total_cash;
                      END;');
                      DB::unprepared('
                      DROP FUNCTION IF EXISTS get_curr_year_total_bank;
                      CREATE FUNCTION `get_curr_year_total_bank`(input_organization_id int) RETURNS double
                          DETERMINISTIC
                      BEGIN
                        DECLARE temp_total_bank double;
                        set temp_total_bank=0;
                        select sum(transaction_details.amount) into  temp_total_bank FROM transaction_masters
                        inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                        where transaction_details.transaction_type_id=1
                        and transaction_masters.voucher_type_id=4
                        and transaction_details.ledger_id=2
                        and year(transaction_masters.transaction_date)=year(curdate())
                        and transaction_masters.organisation_id=input_organization_id;
                        
                        if isnull(temp_total_bank) then
                                set temp_total_bank=0;
                              end if;
                                  
                          RETURN temp_total_bank;
                      END;');


                          DB::unprepared('
                          DROP FUNCTION IF EXISTS get_curr_year_total_cash;
                          CREATE FUNCTION `get_curr_year_total_cash`(input_organization_id int) RETURNS double
                              DETERMINISTIC
                          BEGIN
                                    DECLARE temp_total_cash double;
                                    set temp_total_cash=0;
                                    select sum(transaction_details.amount) into  temp_total_cash FROM transaction_masters
                                    inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                                    where transaction_details.transaction_type_id=1
                                    and transaction_masters.voucher_type_id=4
                                    and transaction_details.ledger_id=1
                                    and year(transaction_masters.transaction_date)=year(curdate())
                                    and transaction_masters.organisation_id=input_organization_id;
                                    
                                    if isnull(temp_total_cash) then
                                            set temp_total_cash=0;
                                          end if;
                                              
                                      RETURN temp_total_cash;
                                  END;');
                              DB::unprepared('
                              DROP FUNCTION IF EXISTS  get_total_course_fees_by_studentregistration;
                            CREATE FUNCTION  `get_total_course_fees_by_studentregistration`(input_studentregistration bigint) RETURNS double
                                DETERMINISTIC
                            BEGIN
                                              DECLARE temp_total_course double;
                                              DECLARE temp_transaction_masters_id int;
                                              set temp_total_course=0;
                                              
                                              select sum(transaction_details.amount) into temp_total_course
                                              from transaction_details
                                              inner join transaction_masters ON transaction_masters.id = transaction_details.transaction_master_id
                                              inner join student_course_registrations ON student_course_registrations.id = transaction_masters.student_course_registration_id
                                              where transaction_details.transaction_type_id=2
                                              and transaction_masters.student_course_registration_id=input_studentregistration;
                                              if isnull(temp_total_course) then
                                                set temp_total_course=0;
                                              end if;
                                              RETURN temp_total_course;
                                          END;');

                      //-----------------------------
            
              DB::unprepared('
              DROP FUNCTION IF EXISTS  get_total_discount_by_studentregistration;
      CREATE FUNCTION  `get_total_discount_by_studentregistration`(input_studentregistration bigint) RETURNS double
          DETERMINISTIC
      BEGIN
                          DECLARE temp_total_discount double;
                          DECLARE temp_transaction_masters_id int;
                          set temp_total_discount=0;
                          
                          select sum(get_total_fees_discount_by_studentregistration_ledger_id(transaction_masters.student_course_registration_id,ledgers.id)) into temp_total_discount
                          FROM transaction_masters
                          inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                          inner join ledgers ON ledgers.id = transaction_details.ledger_id
                          where transaction_details.transaction_type_id=2
                          and transaction_masters.student_course_registration_id=input_studentregistration;
                          if isnull(temp_total_discount) then
                            set temp_total_discount=0;
                          end if;
                          RETURN temp_total_discount;
                      END;');
                      DB::unprepared('
                      DROP FUNCTION IF EXISTS  get_total_fees_discount_transaction_id;
                  CREATE FUNCTION  `get_total_fees_discount_transaction_id`(input_transaction_masters_id bigint) RETURNS double
                      DETERMINISTIC
                  BEGIN
                                    DECLARE temp_total_discount double;
                                    set temp_total_discount=0;
                      
                                    select sum(transaction_details.amount) into temp_total_discount from transaction_masters
                                    inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                                    where transaction_masters.reference_transaction_master_id=input_transaction_masters_id
                                    and transaction_masters.voucher_type_id=4
                                    and transaction_details.transaction_type_id=1
                                    and transaction_details.ledger_id=11;
                                    
                                    
                                    if isnull(temp_total_discount) then
                                      set temp_total_discount=0;
                                    end if;
                                    RETURN temp_total_discount;
                                END;');

             DB::unprepared('
              DROP FUNCTION IF EXISTS  get_total_received_by_studentregistration;
      CREATE FUNCTION  `get_total_received_by_studentregistration`(input_studentregistration bigint) RETURNS double
          DETERMINISTIC
      BEGIN
                          DECLARE temp_total_received double;
                          DECLARE temp_transaction_masters_id int;
                          set temp_total_received=0;
                          
                          select sum(table1.temp_total_received) into temp_total_received
                          from transaction_masters trans_master1,transaction_masters trans_master2
                          inner join (select transaction_masters.id,
                                            transaction_masters.transaction_number,
                                            transaction_masters.transaction_date,
                                            transaction_details.ledger_id,
                                            ledgers.ledger_name,
                                            transaction_details.amount as temp_total_received from transaction_masters
                                            inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                                            inner join ledgers ON ledgers.id = transaction_details.ledger_id
                                            where transaction_masters.voucher_type_id=4
                                            and transaction_details.transaction_type_id=1) as table1
                          where trans_master1.reference_transaction_master_id=trans_master2.id
                          and table1.id = trans_master1.id
                          and trans_master2.student_course_registration_id=input_studentregistration;
                          if isnull(temp_total_received) then
                            set temp_total_received=0;
                          end if;
                          RETURN temp_total_received;
                      END;');

      DB::unprepared('
      DROP FUNCTION IF EXISTS  get_total_due_by_student_registration_id;
CREATE FUNCTION  `get_total_due_by_student_registration_id`(input_student_registration_id bigint) RETURNS double
    DETERMINISTIC
BEGIN
                   DECLARE temp_total_due double;
                   set temp_total_due=0;
                         select get_total_course_fees_by_studentregistration(student_course_registrations.id)-
                         get_total_received_by_studentregistration(student_course_registrations.id) into temp_total_due
                         FROM student_course_registrations
                         where student_course_registrations.id=input_student_registration_id;
                        if isnull(temp_total_due) then
                             set temp_total_due=0;
                        end if;
                   RETURN temp_total_due;
               END;');
        DB::unprepared('
        DROP FUNCTION IF EXISTS  get_total_due_by_transaction_id;
        CREATE FUNCTION  `get_total_due_by_transaction_id`(input_transaction_id bigint) RETURNS double
            DETERMINISTIC
        BEGIN
                          DECLARE temp_total_due double;
                          set temp_total_due=0;
                        select sum(table1.total) into temp_total_due from 
                              (select transaction_masters.id,
                              transaction_details.amount*transaction_types.transaction_type_value as total
                              from transaction_masters
                              inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                              inner join ledgers ON ledgers.id = transaction_details.ledger_id
                              inner join transaction_types on transaction_details.transaction_type_id=transaction_types.id
                              where voucher_type_id=9
                              and transaction_details.transaction_type_id=2
                              union all
                              select transaction_masters.reference_transaction_master_id,
                              transaction_details.amount*transaction_types.transaction_type_value as total
                              from transaction_masters
                              inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                              inner join ledgers ON ledgers.id = transaction_details.ledger_id
                              inner join transaction_types on transaction_details.transaction_type_id=transaction_types.id
                              where voucher_type_id=4
                              and transaction_details.transaction_type_id=1) as table1
                          where table1.id=input_transaction_id
                          group by table1.id;
                              if isnull(temp_total_due) then
                                    set temp_total_due=0;
                              end if;
                          RETURN temp_total_due;
                      END;');
        //--------------------------------------------------
    

  DB::unprepared('
  DROP FUNCTION IF EXISTS  get_total_fees_charge_by_transaction_id;
  CREATE FUNCTION  `get_total_fees_charge_by_transaction_id`(input_transaction_id bigint) RETURNS double
      DETERMINISTIC
  BEGIN
                               DECLARE temp_total_charged double;
                                 set temp_total_charged=0;
                         select sum(transaction_details.amount) into temp_total_charged
                         from transaction_masters
                         inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                         inner join ledgers ON ledgers.id = transaction_details.ledger_id
                         inner join transaction_types on transaction_details.transaction_type_id=transaction_types.id
                         where voucher_type_id=9
                         and transaction_details.transaction_type_id=2
                         and transaction_masters.id=input_transaction_id;
                                 if isnull(temp_total_charged) then
                                   set temp_total_charged=0;
                                 end if;
                                     
                                     RETURN temp_total_charged;
                           END;');
  DB::unprepared('
  DROP FUNCTION IF EXISTS  get_total_fees_charge_by_transaction_ledger_id;
  CREATE FUNCTION  `get_total_fees_charge_by_transaction_ledger_id`(input_transaction bigint,input_ledger_id bigint) RETURNS double
      DETERMINISTIC
  BEGIN
                DECLARE temp_total_charged double;
                  set temp_total_charged=0;
                  select sum(transaction_details.amount) into temp_total_charged from transaction_masters
                  inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                  where transaction_masters.id=input_transaction
                  and transaction_details.transaction_type_id=2
                  and transaction_details.ledger_id=input_ledger_id;
                  if isnull(temp_total_charged) then
                    set temp_total_charged=0;
                  end if;
                      
                      RETURN temp_total_charged;
            END;');
    

                  
        //----------------------------------------------

        

       

        DB::unprepared('
        DROP FUNCTION IF EXISTS  get_total_received_by_transaction_id;
CREATE FUNCTION  `get_total_received_by_transaction_id`(input_transaction_id bigint) RETURNS double
    DETERMINISTIC
BEGIN
                  DECLARE temp_total_received double;
                  set temp_total_received=0;
                 select sum(transaction_details.amount*transaction_types.transaction_type_value) into temp_total_received
                      from transaction_masters
                      inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                      inner join ledgers ON ledgers.id = transaction_details.ledger_id
                      inner join transaction_types on transaction_details.transaction_type_id=transaction_types.id
                      where voucher_type_id=4
                      and transaction_details.transaction_type_id=1
                      and transaction_masters.reference_transaction_master_id=input_transaction_id;
                       if isnull(temp_total_received) then
                            set temp_total_received=0;
                       end if;
                  RETURN temp_total_received;
              END;');

              DB::unprepared('
              DROP FUNCTION IF EXISTS get_total_discount_by_studentregistration_id;
            CREATE FUNCTION `get_total_discount_by_studentregistration_id`(input_studentregistration bigint) RETURNS double
                DETERMINISTIC
            BEGIN
                  DECLARE temp_total_discount double;
                  DECLARE temp_transaction_masters_id int;
                  set temp_total_discount=0;
                  
                  select sum(get_total_fees_discount_transaction_id(transaction_masters.id)) into temp_total_discount
                  from transaction_masters
                  inner join student_course_registrations ON student_course_registrations.id = transaction_masters.student_course_registration_id
                  inner join courses ON courses.id = student_course_registrations.course_id
                  inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
                  where transaction_masters.student_course_registration_id=input_studentregistration;
                  if isnull(temp_total_discount) then
                    set temp_total_discount=0;
                  end if;
                  RETURN temp_total_discount;
              END;');

              DB::unprepared('
                    DROP FUNCTION IF EXISTS get_curr_month_total_bank;
                    CREATE FUNCTION `get_curr_month_total_bank`(input_organization_id int) RETURNS double
                        DETERMINISTIC
                    BEGIN
                         DECLARE temp_total_bank double;
                         set temp_total_bank=0;
                          select sum(transaction_details.amount) into temp_total_bank FROM transaction_masters
                         inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                         where transaction_details.transaction_type_id=1
                         and transaction_masters.voucher_type_id=4
                         and transaction_details.ledger_id=2
                         and month(transaction_masters.transaction_date)=month(curdate())
                         and transaction_masters.organisation_id=input_organization_id
                         and year(transaction_masters.transaction_date)=year(curdate());
                          if isnull(temp_total_bank) then
                                 set temp_total_bank=0;
                               end if;
                                   
                            RETURN temp_total_bank;
                       END;');


    }

    public function down()
    {
        Schema::dropIfExists('all_procedures_and_functions');
    }
}
