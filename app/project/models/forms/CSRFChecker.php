<?php


namespace App\Project\Models\Forms;


trait CSRFChecker
{
    protected function check_csrf(array $data) {
        if (!empty($data['CSRFtoken'])) {
            if (hash_equals($_SESSION['CSRFtoken'], $data['CSRFtoken'])) {
                return true;
            } else {
                $this->addError('wrongCSRF', 'Неправильний токен');
            }
        }
    }
}