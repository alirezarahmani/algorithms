const longest_palindrome = function (s) {
    let i;
    /* Preprocess s: insert '#' between characters, so we don't need to worry about even or odd length palindromes. */
    let new_str = '#';
    for (i = 0; i < s.length; i++) new_str += `${s.charAt(i)}#`;
    /* Process newStr */
    /* dp[i] is the length of LPS centered at i */
    const dp = [];

    let center = 0; let right_boundary = 0; const lps_center = 0; const
        lps_radius = 0;
    let miror;
    for (i = 0; i < new_str.length; i++) {
        if (center + right_boundary > i) {
            miror = center - (i - center);
            dp[i] = Math.min(dp[miror], (center + right_boundary) - i);
        } else {
            dp[i] = 1;
        }

        while (
            i + dp[i] < new_str.length
            && i - dp[i] >= 0
            && new_str[i + dp[i]] === new_str[i - dp[i]]
        ) {
            dp[i]++;
        }

        if (center + right_boundary < i + dp[i]) {
            center = i;
            right_boundary = dp[i];
        }
        if (lps_radius < dp[i]) {
            lps_radius = dp[i];
            lps_center = i;
        }
    }
    return s.substring((lps_center - lps_radius + 1) / 2, (lps_center + lps_radius - 1) / 2);
};

console.log(longest_palindrome('abaxabaxabb'));
