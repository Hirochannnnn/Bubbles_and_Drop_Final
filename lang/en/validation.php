<?php

/*
|--------------------------------------------------------------------------
| Custom validation messages (Bubbles and Drop Laundry Shop)
|--------------------------------------------------------------------------
| These replace Laravel's default error wording across the whole system.
| To change a message, edit the text here. :attribute is the field name
| (see the 'attributes' list at the bottom for the friendly names).
*/

return [

    'required' => 'Please enter the :attribute.',
    'string'   => 'Please enter a valid :attribute.',
    'email'    => 'Please enter a valid email address.',
    'date'     => 'Please enter a valid date for the :attribute.',
    'integer'  => 'The :attribute must be a whole number (no decimals).',
    'numeric'  => 'The :attribute must be a number.',
    'confirmed' => 'The :attribute does not match. Please type it again.',
    'unique'   => 'This :attribute is already in use. Please use a different one.',
    'exists'   => 'The :attribute you selected could not be found. Please choose again.',
    'in'       => 'Please choose a valid :attribute from the list.',
    'lowercase' => 'The :attribute must be in lowercase letters.',
    'regex'    => 'The format of the :attribute is not valid.',

    'max' => [
        'numeric' => 'The :attribute must not be more than :max.',
        'string'  => 'The :attribute is too long. Please use :max characters or fewer.',
        'array'   => 'You can only choose up to :max items for the :attribute.',
        'file'    => 'The :attribute file is too large. The limit is :max KB.',
    ],

    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'string'  => 'The :attribute is too short. Please use at least :min characters.',
        'array'   => 'Please choose at least :min items for the :attribute.',
        'file'    => 'The :attribute file is too small. The minimum is :min KB.',
    ],

    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'string'  => 'The :attribute must be shorter than :value characters.',
        'array'   => 'The :attribute must have fewer than :value items.',
        'file'    => 'The :attribute file must be smaller than :value KB.',
    ],

    'lte' => [
        'numeric' => 'The :attribute must not be more than :value.',
        'string'  => 'The :attribute must not be longer than :value characters.',
        'array'   => 'The :attribute must not have more than :value items.',
        'file'    => 'The :attribute file must not be larger than :value KB.',
    ],

    'after_or_equal'  => 'The :attribute must be on or after :date.',
    'before_or_equal' => 'The :attribute must be on or before :date.',

    'password' => [
        'letters'       => 'The :attribute must contain at least one letter.',
        'mixed'         => 'The :attribute must contain both uppercase and lowercase letters.',
        'numbers'       => 'The :attribute must contain at least one number.',
        'symbols'       => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'This :attribute has appeared in a data leak. Please choose a different one.',
    ],

    /*
    | Messages for specific fields (these override the general ones above).
    */
    'custom' => [
        'category.required'          => 'Please select a category.',
        'unit.required'              => 'Please select a unit.',
        'inventory_item_id.required' => 'Please select an item.',
        'inventory_item_id.exists'   => 'The item you selected could not be found. Please choose again.',
        'service_id.required'        => 'Please select a service.',
        'service_id.exists'          => 'The service you selected could not be found. Please choose again.',
        'status.required'            => 'Please select a status.',
        'payment_status.required'    => 'Please select a payment status.',
        'quantity.required'          => 'Please enter the quantity.',
        'quantity.min'               => 'The quantity must be at least :min.',
        'kilos.min'                  => 'The weight must be at least :min kg.',
        'email.required'             => 'Please enter your email address.',
        'password.required'          => 'Please enter your password.',
    ],

    /*
    | Friendly field names shown in the messages.
    */
    'attributes' => [
        'name'               => 'name',
        'email'              => 'email address',
        'password'           => 'password',
        'password_confirmation' => 'confirm password',
        'full_name'          => 'full name',
        'contact_number'     => 'contact number',
        'customer_code'      => 'customer code',
        'service_id'         => 'service',
        'item_name'          => 'item name',
        'category'           => 'category',
        'unit'               => 'unit',
        'quantity'           => 'quantity',
        'supplier'           => 'supplier',
        'reason'             => 'reason',
        'date'               => 'date',
        'inventory_item_id'  => 'item',
        'machine_name'       => 'machine name',
        'max_capacity'       => 'maximum capacity',
        'maintenance_period' => 'maintenance period',
        'last_maintenance'   => 'last maintenance date',
        'next_maintenance'   => 'next maintenance date',
        'status'             => 'status',
        'payment_status'     => 'payment status',
        'kilos'              => 'weight (kg)',
    ],

];
