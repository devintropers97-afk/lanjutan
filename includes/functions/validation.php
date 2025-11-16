<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Input Validation
 * Form validation functions
 * ========================================
 */

/**
 * Validate required field
 *
 * @param mixed $value Value to validate
 * @return bool Validation status
 */
function validateRequired($value) {
    if (is_array($value)) {
        return !empty($value);
    }

    return !empty(trim($value));
}

/**
 * Validate email format
 *
 * @param string $email Email to validate
 * @return bool Validation status
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate phone number (Indonesian format)
 *
 * @param string $phone Phone to validate
 * @return bool Validation status
 */
function validatePhone($phone) {
    // Remove spaces, dashes, and parentheses
    $phone = preg_replace('/[\s\-\(\)]/', '', $phone);

    // Check Indonesian phone format: 08xx or +628xx or 628xx
    return preg_match('/^(\+62|62|0)8[0-9]{8,11}$/', $phone);
}

/**
 * Validate URL format
 *
 * @param string $url URL to validate
 * @return bool Validation status
 */
function validateUrl($url) {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

/**
 * Validate string length
 *
 * @param string $string String to validate
 * @param int $min Minimum length
 * @param int $max Maximum length
 * @return bool Validation status
 */
function validateLength($string, $min = 0, $max = PHP_INT_MAX) {
    $length = mb_strlen($string);
    return $length >= $min && $length <= $max;
}

/**
 * Validate minimum length
 *
 * @param string $string String to validate
 * @param int $min Minimum length
 * @return bool Validation status
 */
function validateMinLength($string, $min) {
    return mb_strlen($string) >= $min;
}

/**
 * Validate maximum length
 *
 * @param string $string String to validate
 * @param int $max Maximum length
 * @return bool Validation status
 */
function validateMaxLength($string, $max) {
    return mb_strlen($string) <= $max;
}

/**
 * Validate numeric value
 *
 * @param mixed $value Value to validate
 * @return bool Validation status
 */
function validateNumeric($value) {
    return is_numeric($value);
}

/**
 * Validate integer value
 *
 * @param mixed $value Value to validate
 * @return bool Validation status
 */
function validateInteger($value) {
    return filter_var($value, FILTER_VALIDATE_INT) !== false;
}

/**
 * Validate number range
 *
 * @param numeric $value Value to validate
 * @param numeric $min Minimum value
 * @param numeric $max Maximum value
 * @return bool Validation status
 */
function validateRange($value, $min, $max) {
    return is_numeric($value) && $value >= $min && $value <= $max;
}

/**
 * Validate date format
 *
 * @param string $date Date to validate
 * @param string $format Date format (default: Y-m-d)
 * @return bool Validation status
 */
function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

/**
 * Validate password strength
 *
 * @param string $password Password to validate
 * @param int $minLength Minimum length
 * @param bool $requireSpecial Require special characters
 * @return array ['valid' => bool, 'message' => string]
 */
function validatePassword($password, $minLength = 8, $requireSpecial = false) {
    if (strlen($password) < $minLength) {
        return [
            'valid' => false,
            'message' => "Password minimal {$minLength} karakter"
        ];
    }

    if (!preg_match('/[a-z]/', $password)) {
        return [
            'valid' => false,
            'message' => 'Password harus mengandung huruf kecil'
        ];
    }

    if (!preg_match('/[A-Z]/', $password)) {
        return [
            'valid' => false,
            'message' => 'Password harus mengandung huruf besar'
        ];
    }

    if (!preg_match('/[0-9]/', $password)) {
        return [
            'valid' => false,
            'message' => 'Password harus mengandung angka'
        ];
    }

    if ($requireSpecial && !preg_match('/[^a-zA-Z0-9]/', $password)) {
        return [
            'valid' => false,
            'message' => 'Password harus mengandung karakter spesial'
        ];
    }

    return ['valid' => true, 'message' => 'Password valid'];
}

/**
 * Validate username
 *
 * @param string $username Username to validate
 * @return bool Validation status
 */
function validateUsername($username) {
    // Username: alphanumeric, underscore, dash, 3-20 characters
    return preg_match('/^[a-zA-Z0-9_-]{3,20}$/', $username);
}

/**
 * Validate alpha characters only
 *
 * @param string $string String to validate
 * @return bool Validation status
 */
function validateAlpha($string) {
    return ctype_alpha(str_replace(' ', '', $string));
}

/**
 * Validate alphanumeric characters only
 *
 * @param string $string String to validate
 * @return bool Validation status
 */
function validateAlphanumeric($string) {
    return ctype_alnum(str_replace(' ', '', $string));
}

/**
 * Validate field match (e.g., password confirmation)
 *
 * @param mixed $value1 First value
 * @param mixed $value2 Second value
 * @return bool Match status
 */
function validateMatch($value1, $value2) {
    return $value1 === $value2;
}

/**
 * Validate NIB format (Indonesian business ID)
 *
 * @param string $nib NIB to validate
 * @return bool Validation status
 */
function validateNIB($nib) {
    // NIB format: 13 digits with optional dashes
    $nib = str_replace('-', '', $nib);
    return preg_match('/^[0-9]{13}$/', $nib);
}

/**
 * Validate NPWP format (Indonesian tax ID)
 *
 * @param string $npwp NPWP to validate
 * @return bool Validation status
 */
function validateNPWP($npwp) {
    // NPWP format: XX.XXX.XXX.X-XXX.XXX
    $npwp = str_replace(['.', '-'], '', $npwp);
    return preg_match('/^[0-9]{15}$/', $npwp);
}

/**
 * Validate credit card number (Luhn algorithm)
 *
 * @param string $number Card number
 * @return bool Validation status
 */
function validateCreditCard($number) {
    $number = preg_replace('/\D/', '', $number);

    if (strlen($number) < 13 || strlen($number) > 19) {
        return false;
    }

    $sum = 0;
    $isDouble = false;

    for ($i = strlen($number) - 1; $i >= 0; $i--) {
        $digit = (int) $number[$i];

        if ($isDouble) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }

        $sum += $digit;
        $isDouble = !$isDouble;
    }

    return ($sum % 10) === 0;
}

/**
 * Sanitize and validate input data
 *
 * @param array $data Input data
 * @param array $rules Validation rules
 * @return array ['valid' => bool, 'errors' => array]
 */
function validateInput($data, $rules) {
    $errors = [];

    foreach ($rules as $field => $fieldRules) {
        $value = $data[$field] ?? null;
        $rulesArray = explode('|', $fieldRules);

        foreach ($rulesArray as $rule) {
            $ruleParts = explode(':', $rule);
            $ruleName = $ruleParts[0];
            $ruleParam = $ruleParts[1] ?? null;

            switch ($ruleName) {
                case 'required':
                    if (!validateRequired($value)) {
                        $errors[$field][] = ucfirst($field) . ' wajib diisi';
                    }
                    break;

                case 'email':
                    if ($value && !validateEmail($value)) {
                        $errors[$field][] = ucfirst($field) . ' harus berupa email valid';
                    }
                    break;

                case 'phone':
                    if ($value && !validatePhone($value)) {
                        $errors[$field][] = ucfirst($field) . ' harus berupa nomor telepon valid';
                    }
                    break;

                case 'min':
                    if ($value && !validateMinLength($value, (int) $ruleParam)) {
                        $errors[$field][] = ucfirst($field) . " minimal {$ruleParam} karakter";
                    }
                    break;

                case 'max':
                    if ($value && !validateMaxLength($value, (int) $ruleParam)) {
                        $errors[$field][] = ucfirst($field) . " maksimal {$ruleParam} karakter";
                    }
                    break;

                case 'numeric':
                    if ($value && !validateNumeric($value)) {
                        $errors[$field][] = ucfirst($field) . ' harus berupa angka';
                    }
                    break;
            }
        }
    }

    return [
        'valid' => empty($errors),
        'errors' => $errors
    ];
}
?>
