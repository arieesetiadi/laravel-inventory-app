<?php

use App\Constants\UserRole;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * Date format.
 */
const DATE_FORMAT = 'l, j F Y';

/**
 * Time format.
 */
const TIME_FORMAT = 'h:i A';

/**
 * Date and Time format.
 */
const DATE_TIME_FORMAT = DATE_FORMAT . ' ' . TIME_FORMAT;

/**
 * Check current url.
 */
if (!function_exists('is_url')) {
    function is_url($pattern): bool
    {
        return Str::is($pattern, Route::current()->uri);
    }
}

/**
 * Check if the logged in user is the owner.
 */
if (!function_exists('is_owner')) {
    function is_owner(): bool
    {
        return Auth::user()->role == UserRole::OWNER;
    }
}

/**
 * Check if the logged in user is the admin.
 */
if (!function_exists('is_admin')) {
    function is_admin(): bool
    {
        return Auth::user()->role == UserRole::ADMIN;
    }
}

/**
 * Check if the logged in user is the sales.
 */
if (!function_exists('is_sales')) {
    function is_sales(): bool
    {
        return Auth::user()->role == UserRole::SALES;
    }
}

/**
 * Check if the logged in user is the petugas gudang.
 */
if (!function_exists('is_petugas_gudang')) {
    function is_petugas_gudang(): bool
    {
        return Auth::user()->role == UserRole::PETUGAS_GUDANG;
    }
}

/**
 * Format date for general human.
 */
if (!function_exists('human_date')) {
    function human_date(string $datetime, string $locale = null): string
    {
        $carbon = Carbon::make($datetime);
        $carbon->setLocale($locale);
        $carbon->settings(['formatFunction' => 'translatedFormat']);
        $date = $carbon->format(DATE_FORMAT);

        return $date;
    }
}

/**
 * Format time for general human.
 */
if (!function_exists('human_time')) {
    function human_time(string $datetime, string $locale = null): string
    {
        $carbon = Carbon::make($datetime);
        $carbon->setLocale($locale);
        $carbon->settings(['formatFunction' => 'translatedFormat']);
        $time = $carbon->format(TIME_FORMAT);

        return $time;
    }
}

/**
 * Format datetime for general human.
 */
if (!function_exists('human_datetime')) {
    function human_datetime(string $datetime, string $locale = null): string
    {
        $carbon = Carbon::make($datetime);
        $carbon->setLocale($locale);
        $carbon->settings(['formatFunction' => 'translatedFormat']);
        $datetime = $carbon->format(DATE_TIME_FORMAT);

        return $datetime;
    }
}

/**
 * Format date diff for human.
 */
if (!function_exists('human_datetime_diff')) {
    function human_datetime_diff(string $datetime, string $locale = null): string
    {
        $carbon = Carbon::make($datetime);
        $carbon->setLocale($locale);
        $diff = $carbon->diffForHumans();

        return $diff;
    }
}

/**
 * Determine if a string is an email.
 */
if (!function_exists('is_email')) {
    function is_email(string $string): bool
    {
        // Email regular expression pattern
        $pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
        $result = preg_match($pattern, $string);

        return $result;
    }
}

/**
 * Determine if a string is a phone number.
 */
if (!function_exists('is_phone')) {
    function is_phone(string $string): bool
    {
        // Phone number regular expression pattern
        $pattern = '/^\+?[1-9]\d{1,14}$/';
        $result = preg_match($pattern, $string);

        return $result;
    }
}

/**
 * Normalize phone number format (+62).
 */
if (!function_exists('normalize_phone')) {
    function normalize_phone(string $phone): string
    {
        // Remove any non-digit characters from the phone number
        $phone = preg_replace('/\D/', '', $phone);

        // Check if the phone number starts with '0'
        if (substr($phone, 0, 1) === '0') {
            // Replace the leading '0' with '+62'
            $phone = '+62' . substr($phone, 1);
        }

        return $phone ?: null;
    }
}

/**
 * Check a select option should be "selected" or not.
 */
if (!function_exists('check_selected')) {
    function check_selected(mixed $value, mixed $comparator)
    {
        if ($value !== null && $comparator !== null) {
            return ($value == $comparator) ? 'selected' : '';
        }
    }
}

/**
 * Singularize a plural word.
 */
if (!function_exists('singularize')) {
    function singularize(string $plural): string
    {
        return Str::of($plural)->singular();
    }
}

/**
 * Pluralize a singular word.
 */
if (!function_exists('pluralize')) {
    function pluralize(string $singular): string
    {
        return Str::of($singular)->plural();
    }
}
