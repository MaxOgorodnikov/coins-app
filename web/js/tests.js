asyncTest( 'Test calculation', function( assert ) {
    var url = '../application/controllers/coinController.php',
        inputs = [
            '4',
            '85',
            '197p',
            '2p',
            '1.87',
            '£1.23',
            '£2',
            '£10',
            '£1.87',
            '£1p',
            '£1.p',
            '001.41p',
            '4.235p',
            '£1.257422457p'
        ],
        expectedResults = [
            '2 x 2p',
            '1 x 50p, 1 x 20p, 7 x 2p, 1 x 1p',
            '1 x &pound;1, 1 x 50p, 2 x 20p, 3 x 2p, 1 x 1p',
            '1 x 2p', '1 x &pound;1, 1 x 50p, 1 x 20p, 8 x 2p, 1 x 1p',
            '1 x &pound;1, 1 x 20p, 1 x 2p, 1 x 1p',
            '1 x &pound;2',
            '5 x &pound;2',
            '1 x &pound;1, 1 x 50p, 1 x 20p, 8 x 2p, 1 x 1p',
            '1 x &pound;1',
            '1 x &pound;1',
            '1 x &pound;1, 2 x 20p, 1 x 1p',
            '2 x &pound;2, 1 x 20p, 2 x 2p',
            '1 x &pound;1, 1 x 20p, 3 x 2p'
        ];
    expect(inputs.length);

    inputs.forEach(function(item, i, arr) {
        stop();
        $.ajax({
            type: 'POST',
            url: url,
            timeout: 2000,
            data: {userInput: item, js_disabled: 0},
            success: function(data) {
                assert.equal(data.result, inputs[i].replace('£', '&pound;') + ' = ' + expectedResults[i], 'Correct calculation');
                start();
            }
        });
    });




});