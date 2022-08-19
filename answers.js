// Q3 answer
const Q3answer = {
  "users": {
    "1": {
      "id": 2,
      "name": "Bob",
      "favoriteColor": "#FFFFFF"
    },
    "2": {
      "id": 3,
      "name": "Christy",
      "favoriteColor": "#FFFFFF"
    }
  }
}
// Q5 endpoint schema
// USERS
// | "user_id" | "username"  | "email"          |
// | "1"       | "Test User" | "test@email.com" |

// NETWORK
// | "id" | "owner_id" | "name"        | "score1" | "score2" | "score3" |
// | 1    | 1          | "Vnl Network" | 1        | 2        | 3        |

// 'id' = 'network_id'
// 'name' = 'network_name'


// Q5 endpoint return example
const endpointReturn = {
    "id": 1,
    "score1": 1,
    "score2": 2,
    "score3": 3,
    "owner_id": 1,
    "name": "VNL Network",
    "username": "Test User",
    "email": "test@email.com"
}
