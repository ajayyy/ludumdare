<?php

// nodeList are helper functions for dealing with arrays of nodes

function nodeList_GetIds( &$nodes ) {
	// A single node 
	if ( is_array($nodes) && isset($nodes['id']) ) {
		return $nodes['id'];
	}
	// An array of nodes
	else if ( is_array($nodes) ) {
		$ret = [];
		foreach ( $nodes as &$node ) {
			if ( isset($node['id']) ) {
				$ret[] = $node['id'];
			}
		}
		return $ret;
	}
	return null;
}

function nodeList_GetAuthors( &$_nodes ) {
	$authors = [];
	
	if ( is_array($_nodes) && isset($_nodes['id']) ) {
		$nodes = [&$_nodes];
	}
	else {
		$nodes = &$_nodes;
	}
	
	foreach ( $nodes as &$node ) {
		$authors[] = $node['author'];
		
		if ( isset($node['meta']['author']) ) {
			foreach ( $node['meta']['author'] as &$author ) {
				$authors[] = $author;
			}
		}
	}
	
	// Remove duplicates
	return array_unique($authors);
}
