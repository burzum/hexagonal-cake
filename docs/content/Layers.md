# Layers
 
## Application
 
Something has to translate UI-specific values (query strings, POST data, session, etc.) into domain objects. This is where the application layer comes into play. It's job is to translate back and forth between the UI, the data layer and the domain, effectively hiding the domain from the rest of the system.

## Infrastructure


## Domain

The domain layer should be completely isolated from the rest of the system.

Which means the business logic and rules should not be affected with any codes (in Application Layer, Presentation Layer and Infrastructure Layer) changes.

## Presentation

