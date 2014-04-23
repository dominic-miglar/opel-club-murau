# Notizen

Ein Auto-Model hat u.a. auch diese Attribute:

* Boolean isProject: gibt an, ob ein Auto auch ein Projekt ist, um im folgenden zu entscheiden ob auch folgende Informationen gerendert werden sollten:
* Project project: OneToOne Relation Auto<->Project, Project beinhaltet mehrere ProjectEntries (Projekttagebuch)
* ProjectEntry kann Text umfassen. Es sollten Fotos zu ProjectEntries verbunden werden koennen.


