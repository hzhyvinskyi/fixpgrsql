<?php

function trimAll($el) {
    if(!is_array($el)) {
        $el = trim($el);
    } else {
        $el = array_map('trimAll', $el);
    }

    return $el;
}

function intAll($el) {
    if(!is_array($el)) {
        $el = (int)$el;
    } else {
        $el = array_map('intAll', $el);
    }

    return $el;
}

function floatAll($el) {
    if (!is_array($el)) {
        $el = (float)$el;
    } else {
        $el = array_map('floatAll', $el);
    }

    return $el;
}

function hscAll($el) {
    if (!is_array($el)) {
        $el = htmlspecialchars($el);
    } else {
        $el = array_map('hscAll', $el);
    }

    return $el;
}

function mresAll($el) {
    global $link;
    if (!is_array($el)) {
        $el = mysqli_real_escape_string($link, $el);
    } else {
        $el = array_map('mresAll', $el);
    }

    return $el;
}
