FORMAT: 1A

# Example

# ProgramController

## getProgramWithSpeakers [GET /program/{id}/speakers]


+ Parameters
    + id: (int, required) - id of program

## Filter Function [POST /filter]


+ Parameters
    + sort: (string, optional) - filter option
    + title: (string, optional) - ilter option
    + access_token: (string, required) - Auth token

## Eager Loading Example with all relations using transformers [POST /eager]


+ Parameters
    + access_token: (string, required) - Auth token

+ Request (application/json)
    + Body

            {
                "access_token": "bar"
            }

## Return Program with id [POST /orm]


+ Parameters
    + id: (integer, required) - Id of program
    + access_token: (string, required) - Auth token

+ Request (application/json)
    + Body

            {
                "id": "foo",
                "access_token": "bar"
            }

+ Response 200 (application/json)
    + Body

            {
                "program": {
                    "id": 1,
                    "title": "Gala",
                    "subtitle": "subtitle",
                    "description": "Lorem ipsum asdasd",
                    "start": "18:00",
                    "end": "19:00",
                    "url": "",
                    "date": "2017-01-08"
                }
            }

+ Response 422 (application/json)
    + Body

            {
                "error": {
                    "id": [
                        "id field is required."
                    ]
                }
            }

+ Response 500 (application/json)
    + Body

            {
                "error": {
                    "message": "500 Internal Server Error",
                    "status_code": 500
                }
            }