<?php
	namespace Magenest\Movie\Setup;

	use Magento\Framework\Setup\UpgradeDataInterface;
	use Magento\Framework\Setup\ModuleDataSetupInterface;
	use Magento\Framework\Setup\ModuleContextInterface;

	class UpgradeData implements UpgradeDataInterface
	{
	    public function upgrade(
	        ModuleDataSetupInterface $setup,
	        ModuleContextInterface $context
	    ) {
	        $setup->startSetup();
            if (version_compare($context->getVersion(), '2.0.8') < 0) {
                       // Get tutorial_simplenews table
	            $tableName = $setup->getTable('magenest_movie');
	            // Check if the table already exists
	            if ($setup->getConnection()->isTableExists($tableName) == true) {
                              // Declare data
	                $data = [
                                        [
                        'name' => 'Xuan Hai',
                        'description' => 'The description',
                        'rating' => '1998',
                        'director_id' => '1'
	                    ],
	                    [
                            'name' => 'Xuan Hai 01',
                            'description' => 'The description 01',
                            'rating' => '1999',
                            'director_id' => '2'
                        ]
                ];
                // Insert data to table
                foreach ($data as $item) {
                    $setup->getConnection()->insert($tableName, $item);
                }
            }
	        }
            if (version_compare($context->getVersion(), '2.0.8') < 0) {
                // Get tutorial_simplenews table01
                $tableName01 = $setup->getTable('magenest_director');
                // Check if the table already exists
                if ($setup->getConnection()->isTableExists($tableName01) == true) {
                    // Declare data
                    $data = [
                        [
                            'name' => 'Xuan Hai',
                        ],
                        [
                            'name' => 'Xuan Hai 01'
                        ]
                    ];
                    // Insert data to table
                    foreach ($data as $item) {
                        $setup->getConnection()->insert($tableName01, $item);
                    }
                }
            }
            if (version_compare($context->getVersion(), '2.0.8') < 0) {
                // Get tutorial_simplenews table
                $tableName02 = $setup->getTable('magenest_actor');
                // Check if the table already exists
                if ($setup->getConnection()->isTableExists($tableName02) == true) {
                    // Declare data
                    $data = [
                        [
                            'name' => 'Xuan Hai',
                        ],
                        [
                            'name' => 'Xuan Hai 01',
                        ]
                    ];
                    // Insert data to table 02
                    foreach ($data as $item) {
                        $setup->getConnection()->insert($tableName02, $item);
                    }
                }
            }
	        $setup->endSetup();
	    }
	}