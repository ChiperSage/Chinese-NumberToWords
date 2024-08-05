### Descriptions in English and Chinese

#### PHP
**File: `number_to_words.php`**

- **English**: This function converts a number into words in the format of Chinese currency (CNY). The `numberToWords` function splits the decimal number into integer and fractional parts, calling `convertInteger` for the integer part and `convertFraction` for the fractional part. The `convertChunk` function is used to convert smaller segments of the number.
- **Chinese**: 这个函数将数字转换为中文货币（人民币）的格式。`numberToWords` 函数将小数分割为整数部分和小数部分，分别调用 `convertInteger` 和 `convertFraction` 进行转换。`convertChunk` 函数用于转换较小的数字段。

#### Python
**File: `number_to_words.py`**

- **English**: This function converts a number into words in the format of Chinese currency (CNY). The main function `number_to_words` splits the number into integer and fractional parts, using `convert_integer` to handle the integer part and `convert_fraction` to handle the fractional part. The `convert_chunk` function converts three-digit numbers into words.
- **Chinese**: 这个函数将数字转换为中文货币（人民币）的格式。主要函数 `number_to_words` 将数字分割为整数部分和小数部分，使用 `convert_integer` 处理整数部分，使用 `convert_fraction` 处理小数部分。`convert_chunk` 函数用于将三位数转换为单词。

#### C#
**File: `NumberToWords.cs`**

- **English**: This program converts a number into words in the format of Chinese currency (CNY). The `NumberToWords` function splits the number into integer and fractional parts, using `ConvertInteger` to handle the integer part and `ConvertFraction` to handle the fractional part. The `ConvertChunk` function converts three-digit numbers into words.
- **Chinese**: 这个程序将数字转换为中文货币（人民币）的格式。`NumberToWords` 函数将数字分割为整数部分和小数部分，分别使用 `ConvertInteger` 和 `ConvertFraction` 处理。`ConvertChunk` 函数用于将三位数转换为单词。

#### C++
**File: `NumberToWords.cpp`**

- **English**: This program converts a number into words in the format of Chinese currency (CNY). The `numberToWords` function splits the number into integer and fractional parts, then uses `convertChunk` to handle both parts. The `convertChunk` function converts smaller segments of the number into words.
- **Chinese**: 这个程序将数字转换为中文货币（人民币）的格式。`numberToWords` 函数将数字分割为整数部分和小数部分，然后使用 `convertChunk` 分别处理。`convertChunk` 函数用于将较小的数字段转换为单词。

### General Description
- **English**: All these code examples aim to convert a decimal number into words in the context of Chinese currency (CNY), including the breakdown into yuan and fen. Each implementation has a main function that manages the conversion and several helper functions to convert smaller segments of the number and assemble them in the correct format.
- **Chinese**: 所有这些代码示例都旨在将小数转换为中文货币（人民币）的单词，包括分为元和分。每个实现都有一个主要函数来管理转换，并有几个辅助函数来转换较小的数字段并将它们组装成正确的格式。
