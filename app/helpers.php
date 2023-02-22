<?php
//https://laravel-news.com/creating-helpers
//composer dump-autoload

use Carbon\Carbon;

if (! function_exists('get_sql_with_bindings')) {
    function get_sql_with_bindings($query) {
        return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());
    }
}


if (! function_exists('get_age')) {
    function get_age($dateOfBirth) {
        return Carbon::parse($dateOfBirth)->age;
    }
}

if (! function_exists('get_accounting_year')) {
    function get_accounting_year($entry_date) {
        $temp_date = explode("-",$entry_date);
        if($temp_date[1]>3){
            $x = $temp_date[0]%100;
            $accounting_year = $x*100 + ($x+1);
        }else{
            $x = $temp_date[0]%100;
            $accounting_year =($x-1)*100+$x;
        }
        return $accounting_year;
    }
}
if (! function_exists('get_next_year')) {
    function get_next_year($current_year,$current_month) {
        $next_year = $current_year;
        $next_month = $current_month+1;
        if($next_month>12){
            $next_year=$next_year+1;
            $next_month=1;
        }
        return $next_year;
    }
}
if (! function_exists('get_next_month')) {
    function get_next_month($current_year,$current_month) {
        $next_year = $current_year;
        $next_month = $current_month+1;
        if($next_month>12){
            $next_year=$next_year+1;
            $next_month=1;
        }
        return $next_month;
    }
}

if (! function_exists('changeDateFormUTCtoLocal')) {
    function changeDateFormUTCtoLocal($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i:s');
    }
}





