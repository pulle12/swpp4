# Project Name

## Setup Instructions

1. **Unzip the Project**:
   Unzip the project files to your desired location.

2. **Start container**:
   Navigate to app directory and start container
   ```bash
   docker-compose up --build

3. **Try API**:
Windows

PHP/MAC/LINUX/INSOMNIA.rest

```
 curl -X POST http://127.0.0.1:5000/predict -H "Content-Type: application/json" -d '{"tv": 150.0, "radio": 23.0, "newspaper": 12.0}' 
``` 
WINDOWS
 ``` 
  curl -X POST http://127.0.0.1:5000/predict -H "Content-Type: application/json" -d "{\"tv\": 150.0, \"radio\": 23.0, \"newspaper\": 12.0}"
``` 