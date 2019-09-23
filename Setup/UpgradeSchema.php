<?php
namespace Magenest\Movie\Setup;
use Amazon\Login\Model\ResourceModel\CustomerLink;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup,
                            ModuleContextInterface $context)
    {
        //Install table
        if (version_compare($context->getVersion(), '2.0.5') < 0) {
            $installer = $setup;
            $installer->startSetup();
            $connection = $installer->getConnection();
            //Install new database table
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_movie')
            )->addColumn('movie_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ],
                'Movie Id'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k', [
                'unsigned' => true,
                'nullable' => false
            ],
                'Name'
            )->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k', [
                'unsigned' => true,
                'nullable' => false
                ],
                'Description'
            )->addColumn(
                'rating',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                'unsigned' => true,
                'nullable' => false,
                ],
                'Rating'
            )->addColumn(
                'director_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                'unsigned' => true,
                'nullable' => false,
                    ],
                'Director id'
            )
                ->addForeignKey(
                    $setup->getFkName(
                        'magenest_movie',
                        'director_id',
                        $setup->getTable('magenest_director'),
                        'director_id'
                    ),
                    'director_id',
                    $setup->getTable('magenest_director'),
                    'director_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                )
                ->setComment(
                'Cron Schedule'
            );
            $installer->getConnection()->createTable($table);
            $installer->endSetup();
        }
        //Install table1
        if (version_compare($context->getVersion(), '2.0.5') < 0) {
            $installer = $setup;
            $installer->startSetup();
            $connection = $installer->getConnection();
            //Install new database table1
            $table1 = $installer->getConnection()->newTable(
                $installer->getTable('magenest_director')
            )->addColumn('director_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ],
                'director id'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k', [
                'unsigned' => true,
                'nullable' => false
            ],
                'Name'
            )->setComment(
                'Cron Schedule'
            );
            $installer->getConnection()->createTable($table1);
            $installer->endSetup();
        }
        //Install table2
        if (version_compare($context->getVersion(), '2.0.5') < 0) {
            $installer = $setup;
            $installer->startSetup();
            $connection = $installer->getConnection();
            //Install new database table2
            $table2 = $installer->getConnection()->newTable(
                $installer->getTable('magenest_actor')
            )->addColumn('actor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ],
                'actor id'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k', [
                'unsigned' => true,
                'nullable' => false
            ],
                'Name'
            )->setComment(
                'Cron Schedule'
            );
            $installer->getConnection()->createTable($table2);
            $installer->endSetup();

        }
        //Install table3
        if (version_compare($context->getVersion(), '2.0.5') < 0) {
            //Install new database table3
            $table3 = $installer->getConnection()->newTable(
                $installer->getTable('magenest_movie_actor')
            )->addColumn(
                'movie_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                'unsigned' => true,
                'nullable' => false,
            ],
                'movie id'
            )->addColumn(
                'actor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                'unsigned' => true,
                'nullable' => false,
            ],
                'actor id'
            )
                ->addForeignKey(
                    $setup->getFkName(
                        'magenest_movie_actor',
                        'movie_id',
                        $setup->getTable('magenest_movie'),
                        'movie_id'
                    ),
                    'movie_id',
                    $setup->getTable('magenest_movie'),
                    'movie_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                )
                ->setComment(
                'Cron Schedule'
            )
                ->addForeignKey(
                    $setup->getFkName(
                        'magenest_movie_actor',
                        'actor_id',
                        $setup->getTable('magenest_actor'),
                        'actor_id'
                    ),
                    'actor_id',
                    $setup->getTable('magenest_actor'),
                    'actor_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                )
                ->setComment(
                    'Cron Schedule'
                );
            $installer->getConnection()->createTable($table3);
            $installer->endSetup();
        }
    }
}