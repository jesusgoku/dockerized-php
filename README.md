# Dockerized PHP

- Use docker-compose override.
- Posible scaling php containers.
- Working with queue publishers and workers.

```bash
docker-compose -f docker-compose.yml up --build
docker-compose -f docker-compose.yml up
docker-compose up
docker-compose up --scale php=4
```