# Dockerized PHP

- Use docker-compose override.
- Posible scaling php containers.

```bash
docker-compose -f docker-compose.yml up --build
docker-compose -f docker-compose.yml up
docker-compose up
docker-compose up --scale php=4
```