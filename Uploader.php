class Uploader
{
    private $array = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
    private $array2 = array('jpg', 'jpeg', 'png', 'gif');

    public function uploadImg($files)
    {
        if ($files['file']['error'] != 0) {
            return 'Вы не загрузили изображение';
        } elseif ($files['file']['size'] < 5000 || $files['file']['size'] > 50000000) {
            return 'Не подходит размер изображения';
        } else {
            preg_match('#\.(jpe?g|png|gif)$#ui', $files['file']['name'], $matches);

            if (!isset($matches[1])) {
                return 'Принимаются только форматы: jpg, jpeg, png, gif';
            } else {
                $matches[1] = mb_strtolower($matches[1]);

                $temp = getimagesize($files['file']['tmp_name']);

                $name = '/uploaded/'.date('Ymd-His').'image'.rand(10000, 99999).'.'.$matches[1];

                if (!in_array($matches[1], $this->array2)) {
                    return 'Не подходит формат изображения';
                } elseif (!in_array($temp['mime'], $this->array)) {
                    return 'Не подходит тип файла, можно загружать только изображения';
                } elseif (!move_uploaded_file($files['file']['tmp_name'], '.'.$name)) {
                    return 'Изображение не загружено';
                } else {
                    return $name;
                }
            }
        }
    }
}
