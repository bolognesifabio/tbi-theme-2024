<?php
if (in_array(get_post_type($post_id), ['leagues'])) {
    // if (isset($_POST['tbi-league-fixtures'])) {
        // update_post_meta($post_id, 'tbi-leagues-fixtures', $_POST['tbi-league-fixtures']);

        update_post_meta($post_id, 'tbi-leagues-turns', [
            [
                "name" => "Prima giornata",
                "fixtures" => [
                    [
                        "home" => "00AAA",
                        "away" => "00BBB"
                    ],
                    [
                        "home" => "01AAA",
                        "away" => "01BBB"
                    ],
                    [
                        "home" => "02AAA",
                        "away" => "02BBB"
                    ],
                ]
            ],
            [
                "name" => "Seconda giornata",
                "fixtures" => [
                    [
                        "home" => "10AAA",
                        "away" => "10BBB"
                    ],
                    [
                        "home" => "11AAA",
                        "away" => "11BBB"
                    ]
                ]
            ]
        ]);
    // }
}