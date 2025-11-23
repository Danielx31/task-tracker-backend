1.  How would you scale this app for 100k+ users?

-   Use a microservices architecture to separate concerns
-   Implement load balancing with multiple app instances
-   Use a CDN for static assets
-   Optimize database with read replicas and sharding
-   Cache frequently accessed data with Redis/Memcached

2.  How would you implement background jobs (e.g., reminders)?

-   Use a message queue system like Redis Queue or BullMQ
-   Schedule tasks with cron jobs or a job scheduler
-   Process reminders asynchronously to avoid blocking the main app

3. How would you optimize database queries and caching?
    - Add database indexes on frequently queried fields
    - Use query optimization and avoid N+1 queries
    - Implement caching for read-heavy operations with Redis
    - Use database connection pooling
