export function toStandard(value, decimals = 18) {
    return value / Math.pow(10, decimals);
}

export function toSeparator(value) {
    return value.replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}

export function toTwoDecimals(value) {
	return value.toFixed(2);
}

export function toHumanReadable(value) {
    return toSeparator(toTwoDecimals(toStandard(value)));
}

export function luckyNumber(range) {
    return (Math.random() * range.toFixed(18)).toFixed(18);
}

export function eliptic(str) {
    if (str.length > 9) {
        return str.substr(0, 4) + '...' + str.substr(str.length-4, str.length);
    }
    return str;
}