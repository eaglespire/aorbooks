<?php
namespace App\Custom;

class Sanitizer{
    public function __construct()
    {
    }

    public function sanitize_input($item)
    {
        return preg_replace('/\s+/', '', $item);
    }
    public function replace_with_hyphen($item)
    {
        return strtolower(preg_replace('/\s+/', '-', $item));
    }
    public function catenate_strings($item)
    {
        return preg_replace('/\s+/', ' ', $item);
    }
    public function generate_slug($first_var,$sec_var = null, $email_var = null)
    {
        $first_var = $this->sanitize_input($first_var);
        $sec_var = $this->sanitize_input($sec_var);
        $third_var = $this->sanitize_input($email_var);

        /*
         * Strip out the @domain.com from the mail
         */
        $stripped = substr($third_var, 0, strpos($third_var, '@'));
        return strtolower($first_var.'-'.$sec_var.'-'.$stripped);
    }
    public function book_slug($first_var, $sec_var)
    {
        $sec_var = str_replace(['.',',','?','!'], '&', $this->replace_with_hyphen($sec_var));
        return $first_var.'-'.$sec_var;
    }
}
