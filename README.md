[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/rafaelqueiroz/cakephp-sample-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/rafaelqueiroz/cakephp-sample-api/?branch=master)

### CakePHP Sample API

This is an example application with CakePHP.

### Endpoints

##### Recipes

| Name   | Method      | URL                  | Protected |
| ---    | ---         | ---                  | ---       |
| List   | `GET`       | `/recipes`           | ✘         |
| Create | `POST`      | `/recipes`           | ✓         |
| Get    | `GET`       | `/recipes/{id}`      | ✘         |
| Update | `PUT`       | `/recipes/{id}`      | ✓         |
| Delete | `DELETE`    | `/recipes/{id}`      | ✓         |

##### Users

| Name   | Method      | URL                  | Protected |
| ---    | ---         | ---                  | ---       |
| Access Token   | `POST`       | `/users/access_token`           | ✘         |
| Create | `POST`      | `/users`           | ✘         |
