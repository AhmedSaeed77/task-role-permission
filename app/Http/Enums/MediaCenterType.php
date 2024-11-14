<?php

namespace App\Http\Enums;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
enum MediaCenterType : string
{
    use Enumable;
    case NEWS = 'news';
    case IMAGE = 'image';
    case VIDEO = 'video';

    public function validationRules()
    {
        $rules1 = [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'content_ar' => ['required', 'string'],
            'content_en' => ['required', 'string'],
            'image' => ['required', 'exclude', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];

        $rules2 = [
            'title_ar' => ['nullable', 'string'],
            'title_en' => ['nullable', 'string'],
            'content_ar' => ['nullable', 'string'],
            'content_en' => ['nullable', 'string'],
            'image' => ['required', 'exclude', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];

        $rules3 = [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'content_ar' => ['nullable', 'string'],
            'content_en' => ['nullable', 'string'],
            'link' => ['required', 'string'],
            'image' => ['nullable', 'exclude', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];

        return match ($this) {
            self::NEWS => $rules1,
            self::IMAGE => $rules2,
            self::VIDEO => $rules3,
        };
    }

    public function t()
    {
        return match ($this) {
            self::NEWS => __('messages.news'),
            self::IMAGE => __('messages.image'),
            self::VIDEO => __('messages.video'),
        };
    }
}
