#!/bin/bash

set -e

echo "******CREATING EXTENSION UUID-OSSP******"

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --password "$POSTGRES_PASSWORD" --dbname "$POSTGRES_DB" <<-EOSQL
    CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
    COMMIT;
EOSQL