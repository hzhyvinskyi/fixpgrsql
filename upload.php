$array = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
$array2 = array('jpg', 'jpeg', 'png', 'gif');

function uploadImg($array, $array2) {
    if ($_FILES['file']['error'] != 0) {
        return 'Вы не загрузили изображение';
    } elseif ($_FILES['file']['size'] < 5000 || $_FILES['file']['size'] > 50000000) {
        return 'Не подходит размер изображения';
    } else {
        preg_match('#\.(jpe?g|png|gif)$#ui', $_FILES['file']['name'], $matches);

        if (!isset($matches[1])) {
            return 'Принимаются только форматы: jpg, jpeg, png, gif';
        } else {
            $matches[1] = mb_strtolower($matches[1]);

            $temp = getimagesize($_FILES['file']['tmp_name']);

            $name = '/uploaded/'.date('Ymd-His').'image'.rand(10000, 99999).'.'.$matches[1];

            if (!in_array($matches[1], $array2)) {
                return 'Не подходит формат изображения';
            } elseif (!in_array($temp['mime'], $array)) {
                return 'Не подходит тип файла, можно загружать только изображения';
            } elseif (!move_uploaded_file($_FILES['file']['tmp_name'], '.'.$name)) {
                return 'Изображение не загружено';
            } else {
                return $name;
            }
        }
    }
}