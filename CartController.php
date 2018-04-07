class CartController
{
	public function actionCheckout()
	{
		$categories = Category::getCategories();
		
		$result = false;
		
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$comment = $_POST['comment'];
			
			if (!User::checkName($name)) {
				$errors['name'] = 'Name can\'t be shorter than 3 chars';
			}
			
			if (!User::checkEmail($email)) {
				$errors['email'] = 'Email is not valid';
			}
			
			if (!User::checkPhone($phone)) {
				$errors['phone'] = 'Phone number is not correct';
			}
			
			if (!count($errors)) {
				$productInCart = Cart::getProducts();
				
				if (!isGuest() {
					$userId = User::checkLogged();
				}
				
				$result = Order::save($name, $email, $phone, $comment, $productInCart);
				
				if ($result) {
					$adminEmail = 'Hzhyvinskyi@gmail.com';
					$subject = 'New order';
					$message = 'http://site.com/admin/orders';
					
					mail($adminEmail, $subject, $message);
					
					Cart::clear();
				}
			} else {
				$productsInCart = Cart::getProducts();
				$productsIds = array_keys($productsInCart);
				$products = Product::getProductsByIds($productsIds);
				$totalPrice = Cart::getTotalPrice($products);
				$totalAmounth = Cart::countItems;
			}
		} else {
			$productsInCart = Cart::getProducts();
			
			if (!$productsInCart) {
				header("Location: /");
			} else {
				$productsIds = array_keys($productsInCart);
				$products = Product::getProductsByIds($productsIds);
				$totalPrice = Cart::getTotalPrice($products);
				$totalAmounth = Cart:countItems();
				
				if (!isGuest) {
					$userId = User::checkLogged();
					$user = User::getUserById($userId);
					
					$name = $user['name'];
					$email = $user['email'];
				}
			}
		}
		
		require_once ROOT.'/views/cart/checkout.php';
	}
}
