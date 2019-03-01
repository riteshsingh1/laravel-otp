# Otp

[![Latest Version on Packagist][ico-version]][link-packagist]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

```bash
$ composer require imritesh/otp
```

## Usage

### For Sending OTP

```
use imritesh\Otp\Otp;

$new = new ImriteshOtp();
$new->sendOtp('999999999', 'Your-OTP-Code');

```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

```bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email hello@imritesh.com instead of using the issue tracker.

## Credits

-   [Ritesh Singh][link-author]
-   [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/imritesh/otp.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/riteshsingh1/otp
[link-author]: https://github.com/1124ritesh
[link-contributors]: ../../contributors
