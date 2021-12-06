## Getting Started

A quick guide on how to run this project in your localhost.

### Prerequisites
* Composer
* PHP >= 7.2.5
* MySQL 8

### Installation

2. Download the repo or clone it
   ```sh
   git clone https://github.com/t0ledoj/app-a1b11fa1.git
   ```
3. Update the composer
   ```sh
   composer update
   ```
4. Generate a laravel key
   ```sh
   php artisan key:generate
   ```
5. Create an .env file at the root of the project. You can copy .env.example

6. Run laravel migrations
   ```sh
   php artisan migrate
   ```
7. Start the laravel server
   ```sh
   php artisan serve
   ```
<p align="right">(<a href="#top">back to top</a>)</p>



## Usage

You must use Accept key with application/json in the header of your requisitions
   ```sh
   Accept:application/json
   ```

### Endpoints

* Create product
   ```sh
   http://localhost:8000/api/product
   ```
   POST Requisition with the following params
   | Param | Descrição |
   |---|---|
   | string `sku` | SKU of the product. |
   | string `name` | Product name. |
   | int `initialQuantity` | Product initial quantity. |


* Stock movimentation
   ```sh
   http://localhost:8000/api/stock/movement
   ```
   POST Requisition with the following params
   | Param | Descrição |
   |---|---|
   | string `sku` | SKU of the product. |
   | bool `is_in` | Determines if it is a quantity addition or not. |
   | int `quantity` | Product quantity. |


* Return a JSON of the stock history of an specific sku
   ```sh
   http://localhost:8000/api/stock/history/{sku}/
   ```


* Return a JSON of the stock history
   ```sh
   http://localhost:8000/api/stock/history
   ```

<p align="right">(<a href="#top">back to top</a>)</p>


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
