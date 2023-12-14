<?php
session_start();
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);

*/
include '../../Controller/p/ProductsC.php';
include '../../Controller/p/commandeC.php';
include '../../Controller/p/CategorieC.php';
$productC = new ProductC();
$commandeC = new CommandeC();
$commande1C = new CommandeC();
$id_user = $_SESSION['id_user'];
$liste1 = $commandeC->listCommandes($id_user);
if (isset($_POST["updateCommande"])) {

    $commande = new Commande(
        $_POST['idCommande'],
        $_POST['quantite'],
        $_POST['status'],
        $_POST['amount'],
        $_POST['idProduit'],
        $_SESSION['id_user']

    );
    $commandeC->updateCommande($commande, $_POST["idCommande"]);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Orders</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="path/to/sweetalert2.min.css">
    <script src="path/to/sweetalert2.all.min.js"></script>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-image: url('raef.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: #333;
    margin: 0;
    padding: 0;
}

.profile-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 30px;
    border-radius: 10px;
}

h1 {
    font-size: 36px;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

h2 {
    font-size: 28px;
    color: #444;
    text-align: center;
    margin-bottom: 20px;
}
        label {
            display: block;
            margin-bottom: 5px;
        }

        span {
            display: block;
            margin-bottom: 20px;
        }


        .bn5 {
            padding: 0.6em 2em;
            border: none;
            outline: none;
            color: rgb(255, 255, 255);
            background: #111;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
        }

        .bn5:before {
            content: "";
            background: linear-gradient(45deg,
                    #ff0000,
                    #ff7300,
                    #fffb00,
                    #48ff00,
                    #00ffd5,
                    #002bff,
                    #7a00ff,
                    #ff00c8,
                    #ff0000);
            position: absolute;
            top: -2px;
            left: -2px;
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            animation: glowingbn5 20s linear infinite;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            border-radius: 10px;
        }

        @keyframes glowingbn5 {
            0% {
                background-position: 0 0;
            }

            50% {
                background-position: 400% 0;
            }

            100% {
                background-position: 0 0;
            }
        }

        .bn5:active {
            color: #000;
        }

        .bn5:active:after {
            background: transparent;
        }

        .bn5:hover:before {
            opacity: 1;
        }

        .bn5:after {
            z-index: -1;
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: #191919;
            left: 0;
            top: 0;
            border-radius: 10px;
        }

        .product-table {
        width: 100%;
        margin-top: 20px;
    }

    .product-table th,
    .product-table td {
        padding: 8px;
        text-align: left;

    }

    .product-table th {
        background: transparent !important;
    }

    .product-table tbody tr:nth-child(even) {
        background: transparent !important;
    }

    .product-table tbody tr:hover {
        background: transparent !important;
    }

    .int-num {
        width: 50px; /* Adjust as needed */
    }

    .add-to-cart-btn {
        background-color: green;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        transition-duration: 0.4s;
    }
    add-to-cart-btn2
    {
        background-color: red;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        transition-duration: 0.4s;
    }

    .add-to-cart-btn:hover {
        background-color: white;
        color: black;
        border: 1px solid #4caf50;
    }
    .new-section {
    padding: 30px;
    margin-top: 30px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    background-color: rgba(255, 255, 255, 0.95);
    display: flex;
    flex-direction: column;
    align-items: center;
}




.new-section h3 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
    text-transform: uppercase;
    border-bottom: 2px solid #ccc;
    padding-bottom: 8px;
}
    .order-details {
        font-weight: bold;
        color: #555;
    }
    .section-header {
    text-align: center;
    margin-bottom: 30px;
    }
    .orders-heading {
    font-size: 32px;
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 20px;
}
    </style>
</head>

<body>
    <div class="profile-container">
        <section id="new-cars" class="new-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="orders-heading">List Of Orders</h2>
                </div><!--/.section-header-->
                <div class="h3">
                    <table class="product-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantite</th>
                                <th>Date de commande</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>ID User</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--  -->

                            <?php
                            foreach ($liste1 as $commande) {
                                $produit = $productC->getProduitById($commande['idProduit']);

                                ?>
                                <form method="POST" action="">
                                    <td>
                                        <?php echo $produit['Product_name']; ?>
                                    </td>
                                    <td> <input class="int-num" type="number" min="1" name="quantite" id="quantite"
                                            value="<?php echo $commande['quantite']; ?>">
                                        <?php
                                        $amount = $commande['quantite'] * $produit['Product_price'];
                                        ?>
                                    <td>
                                        <?php echo $commande['dateCommande']; ?>
                                    </td>
                                    <td>
                                        <?php echo $commande['status']; ?>
                                    </td>
                                    <td>
                                        <?php echo $commande['amount']; ?>
                                    </td>
                                    <td>
                                        <?php echo $commande['id_user']; ?>
                                    </td>
                                    <td><input class="add-to-cart-btn" type="submit" value="Update" name="updateCommande"
                                            id="updateCommande">
                                        <a class="add-to-cart-btn"
                                            href="/web/Controller/p/SupprimerCommande.php?idCommande=<?php echo $commande['idCommande']; ?>">Cancel</a>
                                        <input type="hidden" name="idCommande"
                                            value="<?php echo $commande['idCommande']; ?>">
                                        <input type="hidden" name="status" value="<?php echo $commande['status']; ?>">
                                        <input type="hidden" name="amount" value="<?= $amount ?>">
                                        <input type="hidden" name="idProduit" value="<?php echo $commande['idProduit']; ?>">
                                    </td>

                                    </tr>
                                </form>
                                <?php
                            }
                        
                            ?>

                            <!--  -->
                        </tbody>
                    </table>
                </div>

            </div><!--/.container-->

        </section>
    </div>

</body>

</html>