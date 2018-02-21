# Emoji Flag 🇦🇺🇦🇷🇩🇰🇵🇱🇺🇦🇬🇧🇺🇸🇱🇧🇪🇫
Converts string of country codes to string of emoji flags. As an argument use a single 2-letter country code or a string of multiple codes.

## Why Emoji
Emoji symbol is a textual replacement for a graphic image file while having the benefits of a graphic image. The image file is already present at your intended destination (a person's device), so why would you transmit the image to them again and again? -- Use emoji!

## Emoji Support
Not every platform (hardware + OS) supports emoji. Therefore, use with caution! To my knowledge, iOS, macOS, Android are capable of displaying emoji. Additionally, some platforms may not be able to display certain flags. If unsure, use this as a reference and easy way to test your platform: <http://unicode.org/emoji/charts/full-emoji-list.html>

## Plain Text Is Now 😎 Faux Rich Text
Now you can include emoji in plain text files, even in plain text emails, making them sharp, colourful and rich looking. You can put emoji flags into your database too!

## ♻ Green Technology ♻
An image file equivalent to an emoji symbol may be tens, hundreds of kilobytes in size, while an emoji symbol is only several bytes. That's a bandwidth saving of around 10,000 times. If you use emoji instead of image files, you reduce your carbon footprint.

```php
use peterkahl\flagMaster\flagMaster;

# Single flag
echo EmojiFlag::emojiFlag('uk'); # 🇬🇧

# String of multiple flags
echo EmojiFlag::emojiFlag('ukcwsxap'); # 🇬🇧🇳🇱🇳🇱🏴

```
