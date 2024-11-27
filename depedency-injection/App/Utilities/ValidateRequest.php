<?php
namespace App\Utilities;
use Exception;

class ValidateRequest {
    
    protected $data;

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function validate(array $rules) {
        $errors = [];
        foreach ($rules as $field => $rule) {
            if ($rule === 'required' && empty($this->data[$field])) {
                $errors[$field] = "The $field field is required.";
            }
        }

        if (!empty($errors)) {
            throw new Exception(json_encode($errors));
        }

        return $this->data;
    }

    public function input($key, $default = null) {
        return $this->data[$key] ?? $default;
    }
}