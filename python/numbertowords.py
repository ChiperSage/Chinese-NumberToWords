def number_to_words(number):
    units = ['', 'thousand', 'million', 'billion', 'trillion']
    unit_names = ['', 'yuan', 'jiao', 'fen']

    num_names = {
        0: 'zero', 1: 'one', 2: 'two', 3: 'three', 4: 'four',
        5: 'five', 6: 'six', 7: 'seven', 8: 'eight', 9: 'nine',
        10: 'ten', 11: 'eleven', 12: 'twelve', 13: 'thirteen',
        14: 'fourteen', 15: 'fifteen', 16: 'sixteen', 17: 'seventeen',
        18: 'eighteen', 19: 'nineteen', 20: 'twenty', 30: 'thirty',
        40: 'forty', 50: 'fifty', 60: 'sixty', 70: 'seventy',
        80: 'eighty', 90: 'ninety'
    }

    def convert_chunk(number):
        if number < 20:
            return num_names[number]
        elif number < 100:
            return num_names[number - number % 10] + (' ' + num_names[number % 10] if number % 10 != 0 else '')
        elif number < 1000:
            return num_names[number // 100] + ' hundred' + (' and ' + convert_chunk(number % 100) if number % 100 != 0 else '')
        return ''

    def convert_integer(number):
        if number == 0:
            return 'zero'
        
        result = ''
        unit_index = 0

        while number > 0:
            chunk = number % 1000
            if chunk > 0:
                result = convert_chunk(chunk) + (' ' + units[unit_index] if unit_index > 0 else '') + ' ' + result
            number //= 1000
            unit_index += 1

        return result.strip() + ' yuan'

    def convert_fraction(fraction):
        if fraction == 0:
            return ''
        fraction_text = ''
        if fraction >= 10:
            fraction_text += convert_chunk(fraction) + ' '
        else:
            fraction_text += 'zero ' + convert_chunk(fraction) + ' '
        return fraction_text + 'fen'

    number = float(number)
    integer_part = int(number)
    fraction_part = int(round((number - integer_part) * 100))

    words = convert_integer(integer_part)
    if fraction_part > 0:
        words += ' and ' + convert_fraction(fraction_part)
    
    return words.strip()

# Example usage
print(number_to_words(1234567.89))
