# Size table
This is a WooCommerce plugin allows you to select and show custom badges for your products.

## Installation
Two options:
1. Upload `/dist/woocommerce-product-badges` to you plugin folder via FTP
2. Upload `/dist/woocommerce-product-badges.zip` via the WP UI

## Config
Badges are defined in `/php/badges.php`

## Usage
Each product has a new "Product Badges" tab.  There you can select specific badges you want to show for this product:
![image](https://user-images.githubusercontent.com/5756475/81511180-4898fe00-930f-11ea-925c-51d0d7793af8.png)

You'll then see the badges show under the add to cart button:
![image](https://user-images.githubusercontent.com/5756475/81511222-aaf1fe80-930f-11ea-82e9-ec1c67042f7c.png)

## Build
```sh
git clone git@github.com:dreischer/Woocommerce-Product-Badges.git
yarn install
make build
```
This will create the contents of `/dist/`