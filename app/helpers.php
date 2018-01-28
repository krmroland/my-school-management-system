<?php

//logged
function optionalLoggedIn()
{
    return optional(auth()->user());
}
