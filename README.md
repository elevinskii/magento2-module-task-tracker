# Simple task tracker for Magento 2

Module provides two pages: page with list of all tasks and page with form for add/edit task.

All actions implemented via AJAX requests.
Tested on Luma theme.

## Installation

Via **composer**:
```
# cd <your Magento install dir>
# composer require idealcode/magento2-module-task-tracker
# bin/magento module:enable IdealCode_TaskTracker
# bin/magento setup:upgrade
# bin/magento setup:di:compile
# bin/magento setup:static-content:deploy
# bin/magento cache:clean
```

Via **git**:
```
# cd <your Magento install dir>
# mkdir app/code/IdealCode
# cd app/code/IdealCode
# git clone git@github.com:elevinskii/magento2-module-task-tracker.git TaskTracker
# bin/magento module:enable IdealCode_TaskTracker
# bin/magento setup:upgrade
# bin/magento setup:di:compile
# bin/magento setup:static-content:deploy
# bin/magento cache:clean
```
