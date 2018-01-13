<?php

function semester_id_field($table)
{
    $table->integer('semester_id')->unsigned()->index();
}

function user_id_field($table)
{
    $table->integer('user_id')->unsigned()->index();
}
