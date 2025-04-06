<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute ទាមទារការទទួលយក។',
    'active_url' => ':attribute មិនមែនជា URL ត្រឹមត្រូវទេ។',
    'after' => ':attribute ទាមទារកាលបរិច្ឆេទបន្ទាប់ពី :date។',
    'after_or_equal' => ':attribute ទាមទារកាលបរិច្ឆេទបន្ទាប់ពី ឬស្មើនឹង :date។',
    'alpha' => ':attribute ទាមទារតែអក្សរប៉ុណ្ណោះ។',
    'alpha_dash' => ':attribute ទាមទារតែអក្សរ លេខ សញ្ញាដក និងសញ្ញាក្រោមប៉ុណ្ណោះ។',
    'alpha_num' => ':attribute ទាមទារតែអក្សរ និងលេខប៉ុណ្ណោះ។',
    'array' => ':attribute ទាមទារជាអារេ។',
    'before' => ':attribute ទាមទារកាលបរិច្ឆេទមុន :date។',
    'before_or_equal' => ':attribute ទាមទារកាលបរិច្ឆេទមុន ឬស្មើនឹង :date។',
    'between' => [
        'numeric' => ':attribute ទាមទារនៅចន្លោះ :min និង :max។',
        'file' => ':attribute ទាមទារនៅចន្លោះ :min និង :max គីឡូបៃ។',
        'string' => ':attribute ទាមទារនៅចន្លោះ :min និង :max តួអក្សរ។',
        'array' => ':attribute ទាមទារមានទំនិញចន្លោះ :min និង :max។',
    ],
    'boolean' => 'វាល :attribute ទាមទារជា ពិត ឬ មិនពិត។',
    'confirmed' => 'ការបញ្ជាក់ :attribute មិនត្រូវគ្នាទេ។',
    'date' => ':attribute មិនមែនជាកាលបរិច្ឆេទត្រឹមត្រូវទេ។',
    'date_equals' => ':attribute ទាមទារកាលបរិច្ឆេទស្មើនឹង :date។',
    'date_format' => ':attribute មិនត្រូវគ្នានឹងទម្រង់ :format ទេ។',
    'different' => ':attribute និង :other ត្រូវតែខុសគ្នា។',
    'digits' => ':attribute ទាមទារ :digits ខ្ទង់។',
    'digits_between' => ':attribute ទាមទារនៅចន្លោះ :min និង :max ខ្ទង់។',
    'dimensions' => ':attribute មានវិមាត្ររូបភាពមិនត្រឹមត្រូវ។',
    'distinct' => 'វាល :attribute មានតម្លៃស្ទួន។',
    'email' => ':attribute ទាមទារជាអាសយដ្ឋានអ៊ីមែលត្រឹមត្រូវ។',
    'ends_with' => ':attribute ទាមទារបញ្ចប់ដោយណាមួយក្នុងចំណោម :values។',
    'exists' => ':attribute ដែលបានជ្រើសរើសមិនត្រឹមត្រូវទេ។',
    'file' => ':attribute ទាមទារជាឯកសារ។',
    'filled' => 'វាល :attribute ទាមទារមានតម្លៃ។',
    'gt' => [
        'numeric' => ':attribute ទាមទារធំជាង :value។',
        'file' => ':attribute ទាមទារធំជាង :value គីឡូបៃ។',
        'string' => ':attribute ទាមទារធំជាង :value តួអក្សរ។',
        'array' => ':attribute ទាមទារមានទំនិញច្រើនជាង :value។',
    ],
    'gte' => [
        'numeric' => ':attribute ទាមទារធំជាង ឬស្មើ :value។',
        'file' => ':attribute ទាមទារធំជាង ឬស្មើ :value គីឡូបៃ។',
        'string' => ':attribute ទាមទារធំជាង ឬស្មើ :value តួអក្សរ។',
        'array' => ':attribute ទាមទារមានទំនិញ :value ឬច្រើនជាងនេះ។',
    ],
    'image' => ':attribute ទាមទារជារូបភាព។',
    'in' => ':attribute ដែលបានជ្រើសរើសមិនត្រឹមត្រូវទេ។',
    'in_array' => 'វាល :attribute មិនមាននៅក្នុង :other ទេ។',
    'integer' => ':attribute ទាមទារជាចំនួនគត់។',
    'ip' => ':attribute ទាមទារជាអាសយដ្ឋាន IP ត្រឹមត្រូវ។',
    'ipv4' => ':attribute ទាមទារជាអាសយដ្ឋាន IPv4 ត្រឹមត្រូវ។',
    'ipv6' => ':attribute ទាមទារជាអាសយដ្ឋាន IPv6 ត្រឹមត្រូវ។',
    'json' => ':attribute ទាមទារជាខ្សែអក្សរ JSON ត្រឹមត្រូវ។',
    'lt' => [
        'numeric' => ':attribute ទាមទារតូចជាង :value។',
        'file' => ':attribute ទាមទារតូចជាង :value គីឡូបៃ។',
        'string' => ':attribute ទាមទារតូចជាង :value តួអក្សរ។',
        'array' => ':attribute ទាមទារមានទំនិញតិចជាង :value។',
    ],
    'lte' => [
        'numeric' => ':attribute ទាមទារតូចជាង ឬស្មើ :value។',
        'file' => ':attribute ទាមទារតូចជាង ឬស្មើ :value គីឡូបៃ។',
        'string' => ':attribute ទាមទារតូចជាង ឬស្មើ :value តួអក្សរ។',
        'array' => ':attribute មិនទាមទារមានទំនិញលើសពី :value ទេ។',
    ],
    'max' => [
        'numeric' => ':attribute មិនទាមទារធំជាង :max ទេ។',
        'file' => ':attribute មិនទាមទារធំជាង :max គីឡូបៃទេ។',
        'string' => ':attribute មិនទាមទារធំជាង :max តួអក្សរទេ។',
        'array' => ':attribute មិនទាមទារមានទំនិញលើសពី :max ទេ។',
    ],
    'mimes' => ':attribute ទាមទារជាឯកសារប្រភេទ: :values។',
    'mimetypes' => ':attribute ទាមទារជាឯកសារប្រភេទ: :values។',
    'min' => [
        'numeric' => ':attribute ទាមទារយ៉ាងហោចណាស់ :min។',
        'file' => ':attribute ទាមទារយ៉ាងហោចណាស់ :min គីឡូបៃ។',
        'string' => ':attribute ទាមទារយ៉ាងហោចណាស់ :min តួអក្សរ។',
        'array' => ':attribute ទាមទារមានទំនិញយ៉ាងហោចណាស់ :min។',
    ],
    'multiple_of' => ':attribute ទាមទារជាចំនួនគុណនឹង :value។',
    'not_in' => ':attribute ដែលបានជ្រើសរើសមិនត្រឹមត្រូវទេ។',
    'not_regex' => 'ទម្រង់ :attribute មិនត្រឹមត្រូវទេ។',
    'numeric' => ':attribute ទាមទារជាលេខ។',
    'password' => 'ពាក្យសម្ងាត់មិនត្រឹមត្រូវទេ។',
    'present' => 'វាល :attribute ទាមទារមានវត្តមាន។',
    'regex' => 'ទម្រង់ :attribute មិនត្រឹមត្រូវទេ។',
    'required' => 'វាល :attribute ត្រូវបានទាមទារ។',
    'required_if' => 'វាល :attribute ត្រូវបានទាមទារនៅពេល :other គឺ :value។',
    'required_unless' => 'វាល :attribute ត្រូវបានទាមទារ លើកលែងតែ :other ស្ថិតនៅក្នុង :values។',
    'required_with' => 'វាល :attribute ត្រូវបានទាមទារនៅពេល :values មានវត្តមាន។',
    'required_with_all' => 'វាល :attribute ត្រូវបានទាមទារនៅពេល :values ទាំងអស់មានវត្តមាន។',
    'required_without' => 'វាល :attribute ត្រូវបានទាមទារនៅពេល :values មិនមានវត្តមាន។',
    'required_without_all' => 'វាល :attribute ត្រូវបានទាមទារនៅពេលគ្មាន :values ណាមួយមានវត្តមាន។',
    'same' => ':attribute និង :other ទាមទារដូចគ្នា។',
    'size' => [
        'numeric' => ':attribute ទាមទារជា :size។',
        'file' => ':attribute ទាមទារជា :size គីឡូបៃ។',
        'string' => ':attribute ទាមទារជា :size តួអក្សរ។',
        'array' => ':attribute ទាមទារមាន :size ទំនិញ។',
    ],
    'starts_with' => ':attribute ទាមទារចាប់ផ្តើមដោយណាមួយក្នុងចំណោម :values។',
    'string' => ':attribute ទាមទារជាខ្សែអក្សរ។',
    'timezone' => ':attribute ទាមទារជាតំបន់ពេលវេលាត្រឹមត្រូវ។',
    'unique' => ':attribute ត្រូវបានប្រើប្រាស់រួចហើយ។',
    'uploaded' => ':attribute បរាជ័យក្នុងការបង្ហោះ។',
    'url' => 'ទម្រង់ :attribute មិនត្រឹមត្រូវទេ។',
    'uuid' => ':attribute ទាមទារជា UUID ត្រឹមត្រូវ។',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'សារប្ដូរតាមបំណង',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'ឈ្មោះ',
        'email' => 'អ៊ីមែល',
        'password' => 'ពាក្យសម្ងាត់',
        'quantity' => 'បរិមាណ',
        'price' => 'តម្លៃ',
        'stock' => 'ស្តុក',
        'category' => 'ប្រភេទ',
        'supplier' => 'អ្នកផ្គត់ផ្គង់',
        'description' => 'ការពិពណ៌នា',
        'barcode' => 'បាកូដ',
        'date' => 'កាលបរិច្ឆេទ',
        'product_code' => 'កូដផលិតផល',
    ],

];