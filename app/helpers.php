<?php

function semester_id_field($table)
{
    $table->integer('semester_id')->unsigned()->index();
}
function signedInUser()
{
    return optional(auth()->user());
}

function user_id_field($table)
{
    $table->integer('user_id')->unsigned()->index();
}
