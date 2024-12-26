## Overview

This repository contains three applications:

1. `todo-components`
   - Exposes components such as input and listing.
2. `host-app`
   - Consumes components from `todo-components`.
3. `yii-app`
   - Loading the entire `host-app` as a single module.
   - It is loading the _jss_ and _css_ files of `host-app` created after building `host-app`

## Prerequisites

Make sure the following are installed on your system:

1. Node.js (required for React apps)
2. PHP (required for Yii app)
   - [PHP DOWNLOAD LINK](https://windows.php.net/download/)
   - Extract the zip folder
   - Set path of extracted folder inside **System Environment variable**
   - Run following command on terminal to make sure php has been installed `php -v`

## How to Run All Applications

### Todo-components

1. Navigate inside the `todo-components` directory.
2. Run `npm install`.
3. Run `npm run build`.
4. Run `npm run preview`.

   **Result:** The `todo-components` app has been built and deployed on a local server. Exposed components can be consumed by any application.

### Host-app

1. Navigate inside the `host-app` directory.
2. Run `npm install`.
3. Run `npm run build`.
4. Run `npm run preview`.

   **Result:** The `host-app` has been built and deployed on a local server. It is consuming exposed components of the `todo-components` app.

### Yii-app

1. Navigate inside the `yii-app` directory.
2. Run `php yii serve --port=8888`.
3. Now open Yii application in browser

   **Result:** `Yii-app` is rendering `host-app` (running on locall server).
