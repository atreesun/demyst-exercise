# Demyst Exercise / Show Me The Money

- Backend: PHP / Laravel + XeroPHP library
  - API endpoint (/BalanceSheet) to get data from Xero API: [XeroController](back\app\Http\Controllers\XeroController.php)
  - Error handling is done via exeptions. Currently two situations are covered, 1 - connection error (GuzzleHttp\Exception\ConnectException), 2 - Xero API error (XeroPHP\ApiException): back\bootstrap\app.php, lines 18-23
  - Unit test to check if the API endpoint returns code 200 with json data: [XeroControllerTest](back\tests\Unit\XeroControllerTest.php)
  - [Dockerfile](back\Dockerfile)
  - TODO: Deploy to AWS ECS / Fargate

- Frontend: Typescript + React
  - The table data is rendered with react-data-table-component
  - Jest unit test to check if the App is rendered: [App renders](front\src\__test__\App.test.tsx)
  - TODO: Deploy front\build\*.* to AWS S3 / Static website
