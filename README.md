# Demyst Exercise / Show Me The Money

- Backend: Laravel with [Xero PHP SDK](https://github.com/XeroAPI/xero-php-oauth2)
  - API endpoint (/BalanceSheet) to get data from Xero API: [XeroController](back/app/Http/Controllers/XeroController.php)
  - Error handling is done via exeptions. Currently two situations are covered, 1 - connection error (GuzzleHttp/Exception/ConnectException), 2 - Xero API error (XeroPHP/ApiException): [Exceptions](back/bootstrap/app.php)
  - Unit test to check if the API endpoint returns code 200 with json data: [XeroControllerTest](back/tests/Unit/XeroControllerTest.php)
  - Containerized and deployed to [AWS ECS (Fargate)](https://api.demyst.khanin.me/BalanceSheet)

- Frontend: [Typescript + React](front/src/App.tsx)
  - The table data is rendered with [react-data-table-component](https://www.npmjs.com/package/react-data-table-component)
  - Jest unit test to check if the App is rendered: [App renders](front/src/__test__/App.test.tsx)
  - Deployed to [S3 (published with CloudFront)](https://demyst.khanin.me/)
