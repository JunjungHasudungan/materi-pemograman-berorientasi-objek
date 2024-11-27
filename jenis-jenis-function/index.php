<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include 'Helper.php';
        $datas = [
            [
                'name'      => 'Apple MacBook Pro 17"', 
                'colour'    => 'Silver', 
                'category'  => 'Laptop', 
                'price'     => '$2999'
            ],
            [
                'name'      => 'Microsoft Surface Pro', 
                'colour'    => 'White', 
                'category'  => 'Laptop PC', 
                'price'     => '$1999'
            ],
            [
                'name'      => 'Magic Mouse 2', 
                'colour'    => 'Black', 
                'category'  => 'Accessories', 
                'price'     => '$99'
            ],
        ];
        $helper = new Helper();


    ?>
    <title> <?php echo $helper->display(); ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <div class="mt-2 relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Color
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($datas) > 0): ?>
                    <?php foreach($datas as $key => $item) :?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                <?php echo $key + 1; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php $helper->displayData($item['name']); ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php $helper->displayData($item['colour']); ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php $helper->displayData($item['category']); ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php $helper->displayData($item['price']); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                        <span class="font-medium">Warning alert!</span> Change a few things up and try submitting again.
                    </div>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>