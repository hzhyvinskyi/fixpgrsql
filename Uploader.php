class Uploader
{
    private $array = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
    private $array2 = array('jpg', 'jpeg', 'png', 'gif');

    public function uploadImg($files)
    {
        if ($files['file']['error'] != 0) {
            return 'You didn\'t upload image';
        } elseif ($files['file']['size'] < 5000 || $files['file']['size'] > 50000000) {
            return 'Image wasn\'t uploaded';
        } else {
            preg_match('#\.(jpe?g|png|gif)$#ui', $files['file']['name'], $matches);

            if (!isset($matches[1])) {
                return 'Allowed formats: jpg, jpeg, png, gif';
            } else {
                $matches[1] = mb_strtolower($matches[1]);

                $temp = getimagesize($files['file']['tmp_name']);

                $name = '/uploaded/'.date('Ymd-His').'image'.rand(10000, 99999).'.'.$matches[1];

                if (!in_array($matches[1], $this->array2)) {
                    return 'Incorrect image format';
                } elseif (!in_array($temp['mime'], $this->array)) {
                    return 'Incorrect file type. Allowed only image';
                } elseif (!move_uploaded_file($files['file']['tmp_name'], '.'.$name)) {
                    return 'Image wasn\'t uploaded';
                } else {
                    return $name;
                }
            }
        }
    }
}
