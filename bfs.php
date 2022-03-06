<?php


$graph = [
    'A' => ['B', 'C'],
    'B' => ['A', 'D'],
    'D' => ['B'],
    'C' => ['A',],
];

//bfs($graph, 'A', 'D'); // true
//bfs($graph, 'A', 'G'); // false
print_r(bfs_path($graph, 'A', 'D')); // ['A', 'B', 'D']


function bfs_path($graph, $start, $end) {
    $queue = new SplQueue();
    # Enqueue the path
    $queue->enqueue([$start]);
    $visited = [$start];
    while ($queue->count() > 0) {
        $path = $queue->dequeue();
        # Get the last node on the path
        # so we can check if we're at the end
        $node = $path[sizeof($path) - 1];
        
        if ($node === $end) {
            return $path;
        }
        foreach ($graph[$node] as $neighbour) {
            if (!in_array($neighbour, $visited)) {
                $visited[] = $neighbour;
                # Build new path appending the neighbour then and enqueue it
                $new_path = $path;
                $new_path[] = $neighbour;
                $queue->enqueue($new_path);
            }
        };
    }
    return false;
}
