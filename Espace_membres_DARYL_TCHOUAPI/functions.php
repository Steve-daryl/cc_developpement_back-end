<?php
function isAdmin($user) {
    return isset($user['role']) && $user['role'] === 'admin';
}
?>