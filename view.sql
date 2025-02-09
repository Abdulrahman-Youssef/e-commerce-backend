string items_categoray_view  = "CREATE VIEW items_catigoray_view AS
SELECT items.* ,categories.* FROM categories INNER JOIN
 items ON items.items_catigoray = categories.categories_id";

string items_categoray_view1 = 
"SELECT items_category_view.*  , 1 as favorite FROM items_category_view  
INNER JOIN favorite ON  favorite.favorite_itemid = items_id AND favorite.favorite_userid = 1  
UNION ALL 
SELECT * , 0 AS favorite FROM items_category_view
WHERE items_id != (
SELECT items_category_view.items_id FROM items_category_view  
INNER JOIN favorite ON  favorite.favorite_itemid = items_id AND favorite.favorite_userid = 1  
) 
";



string cart_items_view = 
"SELECT cart.* , items.* FROM cart 
INNER JOIN items ON cart.cart_item_id = items.items_id " ;

