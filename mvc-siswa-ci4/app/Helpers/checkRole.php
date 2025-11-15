<?php

function checkRole($roles = [])
{
    $role = session()->get('role');

    if (!in_array($role, $roles)) {
        return false;
    }

    return true;
}
