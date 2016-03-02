<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    "accepted" => ":attribute jabūt atzīmētam.",
    "active_url" => "Laukam :attribute jabūt korektai adresei.",
    "after" => "Laukā :attribute jābūt datumam pēc :date.",
    "alpha" => "Lauks :attribute var saturēt tikai burtus.",
    "alpha_dash" => "Lauks :attribute var saturēt tikai burtus, ciparus un defisi, un apakšsvītru.",
    "alpha_num" => "Lauks :attribute var saturēt tikai burtus un ciparus.",
    "array" => "Laukā :attribute jābūt vairākām vērtībām.",
    "before" => "Laukā :attribute jābūt datumam pirms :date.",
    "date" => "Laukā :attribute jābūt korektai vērtībai.",
    "between" => array(
        "numeric" => "Laukā :attribute jābūt vērtībai no :min līdz :max.",
        "file" => "Failam :attribute jābūt :min - :max kilobytes.",
        "string" => "Lauka :attribute jābūt no :min līdz :max simboliem.",
    ),
    "confirmed" => "Lauks :attribute nesakrīt ar apstriprinājuma lauku.",
    "count" => "Laukam :attribute jābūt tieši :count izvēlētām vērtībām.",
    "countbetween" => "Laukam :attribute jābūt no :min līdz :max izvēlētām vērtībām.",
    "countmax" => "Laukam :attribute jābūt mazām nekā :max izvēlētām vērtībām.",
    "countmin" => "Laukam :attribute jābūt vismaz :min izvēlētām vērtībām.",
    "date_format" => "Laukam :attribute jābūt korektam datumam.",
    "different" => "Laukam :attribute un :other jāatšķiras.",
    "email" => "Laukā :attribute nav korekta vērtība.",
    "exists" => "Laukā :attribute ir nederīga vērtība.",
    "image" => "Laukā :attribute jābūt attēlam.",
    "in" => "Izvēlētā vērtība laukā :attribute ir nederīga.",
    "integer" => "Laukā :attribute jābūt veselam skaitlim.",
    "ip" => "Laukā :attribute jābūt korektai IP adresei.",
    "regex" => "Laukā :attribute ir nederīga vērtība.",
    "max" => array(
        "numeric" => "Laukam :attribute jābūt mazākam par :max.",
        "file" => "Laukam :attribute jābūt mazākam par :max kilobytes.",
        "string" => "Laukam :attribute jābūt īsākam par :max simboliem.",
    ),
    "mimes" => "Laukam :attribute jābūt šāda tipa failam: :values.",
    "min" => array(
        "numeric" => "Laukam :attribute jābūt lielākam par :min.",
        "file" => "Laukam :attribute jābūt lielākam par :min kilobytes.",
        "string" => "Laukam :attribute jābūt garākam par :min simboliem.",
    ),
    "not_in" => "Laukā :attribute ir nederīga vērtība.",
    "numeric" => "Laukam :attribute jābūt skaitlim.",
    "required" => "Lauks :attribute ir obligāts.",
    "required_without" => "Lauks :attribute ir obligāts, ja netiek aizpildīts lauks :values",
    "required_with" => "Lauks :attribute ir obligāts, ja aizpildīts lauks :values",
    "same" => "Laukam :attribute un :other jābūt vienādiem.",
    "size" => array(
        "numeric" => "Laukam :attribute jābūt :size ciparus lielam.",
        "file" => "Laukam :attribute jābūt :size kilobyte lielam.",
        "string" => "Laukam :attribute jābūt :size simbolus garam.",
    ),
    "unique" => "Šis :attribute jau ir aizņemts.",
    "url" => "Laukā :attribute ir nederīga vērtība.",
    "recaptcha" => 'Lauks :attribute nav pareizs',
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

    'custom' => array(),
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => array(),

);
