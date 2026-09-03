<?php
// Merge sort for ordering blog posts by date (most recent first).
// Sorting is done in PHP rather than using SQL ORDER BY,
// as required by the project specification.

function mergeSort($posts) {

    $count = count($posts);

    // Base case - an array of 0 or 1 elements is already sorted
    if ($count <= 1) {
        return $posts;
    }

    // Split the array into two halves
    $middle = (int) floor($count / 2);
    $left = array_slice($posts, 0, $middle);
    $right = array_slice($posts, $middle);

    // Recursively sort each half
    $left = mergeSort($left);
    $right = mergeSort($right);

    // Merge the sorted halves back together
    return merge($left, $right);
}

function merge($left, $right) {

    $result = [];
    $i = 0;
    $j = 0;

    // Compare front elements of each array, take the more recent date first
    while ($i < count($left) && $j < count($right)) {

        $leftDate = strtotime($left[$i]['created_at']);
        $rightDate = strtotime($right[$j]['created_at']);

        if ($leftDate >= $rightDate) {
            $result[] = $left[$i];
            $i++;
        } else {
            $result[] = $right[$j];
            $j++;
        }
    }

    // Add any leftover elements from either side
    while ($i < count($left)) {
        $result[] = $left[$i];
        $i++;
    }

    while ($j < count($right)) {
        $result[] = $right[$j];
        $j++;
    }

    return $result;
}
?>
